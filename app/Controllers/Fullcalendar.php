<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\UserbookingModel;
use App\Models\BookingModel;
use App\Models\MainModel;
use App\Models\AcceptbookingModel;
use Dompdf\Dompdf;  
class Fullcalendar extends BaseController
{
    private $userbooking;
    private $booking;
    private $book;
    private $main;
    private $acceptev;
    public function __construct()
    {
        $this->userbooking = new UserbookingModel();
        $this->booking = new UserbookingModel();
        $this->book = new BookingModel();
        $this->main = new MainModel();
        $this->acceptev = new AcceptbookingModel();
        helper(['form']); 
    }

    public function Accept()
    {
        $accept = $this->request->getVar('accept');
        if(empty($accept))
        {
            return redirect()->to('canlendar')->with('msg', 'No Data to Insert');
        }
        $acceptMe = $this->getBook($accept);
                    $this->acceptBooking($acceptMe);
                    $this->removePending($accept);
            return redirect()->to('calendar');
    }

    private function getBook($accept)
    {
        $acceptMe = $this->booking->where('bookingId', $accept)->get()->getResultArray();
        return $acceptMe;
    }

    private function acceptBooking($acceptMe)
    {

        if (empty($acceptMe)) {
            return redirect()->to('canlendar')->with('msg', 'No Data to Insert');
        }
    
        $acceptBookings = [];

        foreach($acceptMe as $a)
        {
            $acceptBookings[] = [
            'usersignsId' => $a['usersignsId'],
            'lastname' => $a['lastname'],
            'firstname' => $a['firstname'],
            'middlename' => $a['middlename'],
            'contactnum' => $a['contactnum'],
            'event' => $a['event'],
            'prefferdate' => $a['prefferdate'],
            'Time' => $a['Time'],
            'equipment' => $a['equipment'],
            'comments' => $a['comments'],
            'status' => 'Accepted'
            ];
        }
        
        $this->book->InsertBatch($acceptBookings);
    }
    
    private function removePending($accept)
    {
        $this->booking->where('bookingId', $accept)->delete();
    }


    public function try()
    {
            $data = [
                'reg' => $this->main->findALl(),
                
            'notif' => $this->booking->where('status', 'pending')->first(),
            'getnotif' => $this->booking
                ->select('userbooking.bookingId, userbooking.lastname, userbooking.firstname, 
                    userbooking.middlename, userbooking.contactnum, userbooking.event, 
                    userbooking.time, userbooking.prefferdate, userbooking.equipment, 
                    userbooking.comments, userbooking.status, userbooking.usersignsId, 
                    user.userID, user.LastName, user.FirstName')
                ->join('user', 'user.userID = userbooking.usersignsId')
                ->where('userbooking.status', 'Accepted')
                ->orWhere('userbooking.status', 'Pending')
                ->findAll(),
            'countNotifs' => $this->booking->where('status', 'pending')->countAllResults()
                   ];
       
        return view('dashboard/reports',$data);

    }

    public function searchRes()
    {
        $searchParams = [
            'todate' => $this->request->getVar('todate')
        ];
        
        // Assuming $this->main is an instance of your model
        $data = [
            'booking' => $this->main->findAll(), // Fetching all data from the model
            'reg' => $this->main->where('RegDate <=', $searchParams['todate'])
                                ->where('scstatus', 'Unarchive')
                                ->findAll(), // Fetching data where RegistrationDate falls between $regdate and $todate
            'searchParams' => $searchParams, // Passing search parameters to the view
            'notif' => $this->userbooking->where('status', 'pending')->first(),
            'getnotif' => $this->userbooking
                ->select('userbooking.bookingId, userbooking.lastname, userbooking.firstname, 
                    userbooking.middlename, userbooking.contactnum, userbooking.event, 
                    userbooking.time, userbooking.prefferdate, userbooking.equipment, 
                    userbooking.comments, userbooking.status, userbooking.usersignsId, 
                    user.userID, user.LastName, user.FirstName')
                ->join('user', 'user.userID = userbooking.usersignsId')
                ->where('userbooking.status', 'Accepted')
                ->orWhere('userbooking.status', 'Pending')
                ->findAll(),
            'countNotifs' => $this->userbooking->where('status', 'pending')->countAllResults() // Fetching data where RegistrationDate falls between $searchRes and $search
        ];
        
        if (!empty($query)) {
            $data['reg'] = $query;
        } else {
            // No data found, handle this situation here
            // For example, you can set a message to display in the view
                $data['no_data_message'] = 'No data found.';
        }
        
        return view('dashboard/reportstable', $data);
    }

    public function generateElderlyReport($search)
    {
        set_time_limit(120);
        
        // Use local file path for the image
        $imagePath = $_SERVER['DOCUMENT_ROOT'] . '/picture.jpg';
        if (file_exists($imagePath)) {
            $imageData = base64_encode(file_get_contents($imagePath));
            $imageSrc = 'data:image/jpeg;base64,' . $imageData;
        } else {
            die('Image not found.');
        }

        // Fetch data from the model
        $data = [
            'booking' => $this->main->findAll(), // Fetching all data from the model
            'reg' => $this->main->where('RegDate <=', $search)
                                 ->where('scstatus', 'Unarchive')
                                 ->find() // Fetching data where RegistrationDate falls between $searchRes and $search
        ];
        $closestLowerRecord = $this->main->where('RegDate <=', $search)
                                     ->where('scstatus', 'Unarchive')
                                     ->orderBy('RegDate', 'ASC')
                                     ->first(); // Getting the record with the closest lower date

     $closestLowerDate = $closestLowerRecord ? $closestLowerRecord['RegDate'] : 'N/A'; // Default to 'N/A' if no record found



        $count = $this->main->where('RegDate <=', $search)
                            ->where('scstatus', 'Unarchive')
                            ->countAllResults();

        
        $dompdf = new Dompdf();
        $options = $dompdf->getOptions();
        $options->set('isRemoteEnabled', true); // Enable remote content
        $options->set('isHtml5ParserEnabled', true); // Enable HTML5 parsing
        $dompdf->setOptions($options);
        $currentDate = date('Y-m-d'); // Get the current date in 'YYYY-MM-DD' format
       
        // Define the HTML content
        $html = '
        <html>
        <head>
        <style>
        body {
            font-family: Arial, sans-serif;
            font-size: 15px;
            margin: 20px;
        }
        .header {
            text-align: center;
            position: relative;
        }
        .header img {
            position: absolute;
            left: 0;
            top: 0;
            height: 100px;
        }
            table {
                width: 100%;
                border-collapse: collapse;
                margin-top: 20px;
                table-layout: fixed;
            }
        table, th, td {
            border: 1px solid black;
            word-wrap: break-word;
        }
        th, td {
            padding: 4px;
            text-align: left;
        }
        .footer {
            position: fixed;
            bottom: 0;
            left: 0;
            width: 100%;
            text-align: left;
            margin-top: 16px;
        }
        .footer .report {
            font-weight: 600;
        }
        .signatures {
            display: flex;
            flex-direction: column;
        }
        .signatures p {
            margin: 2px 0;
            
        }
        .content {
            page-break-after: auto;
        }
    </style>
        </head>
        <body >
            <div style="text-align: center;position:relative;">
                <img src="' . $imageSrc . '" alt="Logo" style="position:absolute;left:0;top:0;height:120px">
                <h5 style="margin: 0;">Republic of the Philippines</h5>
                <h5 style="margin: 0;">Province of Oriental Mindoro</h5>
                <h5 style="margin: 0;">Barangay Managpi, Calapan City</h5>
                <h5 style="margin: 0;">Company Registration Number: CN2011421030</h5>
                <h5 style="margin: 0;">Company TIN Number: 008-893-471</h5>
                <h4 style="margin: 0; padding-top: 5px;">ARUGA-KAPATID FOUNDATION INCORPORATED</h4>
            </div>

            <h3  style="text-align: center;">Aruga Kapatid Foundation Incorporated</h3>
            <h4  style="text-align: center;">Elder Care Program Participant Report</h4>

            <p>Date: ' . $currentDate . '</p>
            <p>Reporting Period: '. $closestLowerDate .'  -  ' . $search . '</p>
            
            <table border="1" style="border-collapse: collapse; border: 1px solid black;">
                <thead>
                    <tr>
                        <th>Last Name</th>
                        <th>First Name</th>
                        <th>Middle Name</th>
                        <th>Nickname</th>
                        <th>Date of Birth</th>
                        <th>Gender</th>
                        <th>Marital Status</th>
                        <th>Contact Number</th>
                        <th>Address</th>
                        <th>Registration Date</th>
                    </tr>
                </thead>
                <tbody>';
                
        // Loop through the data and append rows to the HTML table with inline styles
        foreach ($data['reg'] as $reg) {
            $html .= '<tr>
                <td>' . $reg['lastname'] . '</td>
                <td>' . $reg['firstname'] . '</td>
                <td>' . $reg['middlename'] . '</td>
                <td>' . $reg['nickname'] . '</td>
                <td>' . $reg['DateBirth'] . '</td>
                <td>' . $reg['gender'] . '</td>
                <td>' . $reg['marital_stat'] . '</td>
                <td>' . $reg['ContNum'] . '</td>
                <td>' . $reg['EmergencyAdd'] . '</td>
                <td>' . $reg['RegDate'] . '</td>
            </tr>';
        }
        
        // Close the HTML table and body
        $html .= '</tbody></table>
        
        <p style="font-weight:600;">Summary</p>
        <p>During the reporting period, a total of '. $count.' elderly individuals were registered in the Elder Care Program of Aruga Kapatid Foundation Incorporated.</p>
       
            <div class="footer">
            <p class="report">Report Generated By:</p>
            <br>
            <div class="signatures">
                <p>Henry Dacanay III</p>
                <p>Admin Staff</p>
            </div>
            <p class="report">Approved By:</p>
            <br>
            <div class="signatures">
                <p>Lito Vergara</p>
                <p>Administrator</p>
            </div>
        </div>
    </body>
    </html>';
        
        // Load HTML content into Dompdf
        $dompdf->loadHtml($html);
        
        // Set paper size and orientation (optional)
        $dompdf->setPaper('A4', 'portrait');
        
        // Render PDF (optional: save to file or stream to browser)
        $dompdf->render();
        
        // Output the PDF as a string (inline display in the browser)
        $dompdf->stream('Elderly_Report.pdf', array('Attachment' => true));
        
        // Stop CodeIgniter from further processing (optional, but good practice)
        exit();

        
    }


    public function previewElders($search)
    {
        set_time_limit(120);
        
        // Use local file path for the image
        $imagePath = $_SERVER['DOCUMENT_ROOT'] . '/picture.jpg';
        if (file_exists($imagePath)) {
            $imageData = base64_encode(file_get_contents($imagePath));
            $imageSrc = 'data:image/jpeg;base64,' . $imageData;
        } else {
            die('Image not found.');
        }
        $closestLowerRecord = $this->main->where('RegDate <=', $search)
            ->where('scstatus', 'Unarchive')
            ->orderBy('RegDate', 'ASC')
            ->first();  // Getting the record with the closest lower date
        // Fetch data from the model
        $data = [
            'booking' => $this->main->findAll(), // Fetching all data from the model
            'reg' => $this->main->where('RegDate <=', $search)
                                 ->where('scstatus', 'Unarchive')
                                 ->find(), // Fetching data where RegistrationDate falls between $searchRes and $search
            
            'closestLowerDate' =>  $closestLowerRecord ? $closestLowerRecord['RegDate'] : 'N/A',
            'count' => $this->main->where('RegDate <=', $search)
            ->where('scstatus', 'Unarchive')
            ->countAllResults(),
            'currentDate' => date('Y-m-d'),
            'search' => $search
        ];

        return view('dashboard/preview', $data);
    }

    public function generateEventReport($searchRevent, $searchR)
    {
        set_time_limit(120);
    
        // Use local file path for the image
        $imagePath = $_SERVER['DOCUMENT_ROOT'] . '/picture.jpg';
        if (file_exists($imagePath)) {
            $imageData = base64_encode(file_get_contents($imagePath));
            $imageSrc = 'data:image/jpeg;base64,' . $imageData;
        } else {
            die('Image not found.');
        }
    
        $data = [
            'acceptev' => $this->acceptev->where('prefferdate >=', $searchRevent)
                ->where('prefferdate <=', $searchR)
                ->where('status', 'Accepted')
                ->findAll(),
        ];
    
        // Calculate the total amount raised
        $totalAmountRaised = 0;
        foreach ($data['acceptev'] as $acceptev) {
            $totalAmountRaised += $acceptev['amount_raised'];
        }
    
        $dompdf = new Dompdf();
        $options = $dompdf->getOptions();
        $options->set('isRemoteEnabled', true); // Enable remote content
        $options->set('isHtml5ParserEnabled', true); // Enable HTML5 parsing
        $dompdf->setOptions($options);
    
        $currentDate = date('Y-m-d'); // Get the current date in 'YYYY-MM-DD' format
    
        // Define the HTML content
        $html = '
            <html>
            <head>
                <style>
                    body {
                        font-family: Arial, sans-serif;
                        font-size: 15px;
                        margin: 20px;
                    }
                    .header {
                        text-align: center;
                        margin-bottom: 20px;
                    }
                    .header img {
                        display: block;
                        margin: 0 auto 10px;
                        height: 100px;
                    }
                    .header h5, .header h4 {
                        margin: 2px 0;
                    }
                    table {
                        width: 100%;
                        border-collapse: collapse;
                        margin-top: 20px;
                        table-layout: fixed;
                    }
                    table, th, td {
                        border: 1px solid black;
                        word-wrap: break-word;
                    }
                    th, td {
                        padding: 8px;
                        text-align: left;
                    }
                    .footer {
                        text-align: left;
                        margin-top: 20px;
                    }
                    .footer .report {
                        font-weight: 600;
                    }
                    .signatures {
                        display: flex;
                        flex-direction: column;
                        margin-top: 10px;
                    }
                    .signatures p {
                        margin: 2px 0;
                    }
                    .acknowledgement {
                        margin-top: 20px;
                    }
                    .acknowledgement p {
                        margin: 2px 0;
                        font-weight: 600;
                    }
                    .content {
                        page-break-after: auto;
                    }
                </style>
            </head>
            <body>
                <div class="header">
                    <img src="' . $imageSrc . '" alt="Logo">
                    <h5>Republic of the Philippines</h5>
                    <h5>Province of Oriental Mindoro</h5>
                    <h5>Barangay Managpi, Calapan City</h5>
                    <h5>Company Registration Number: CN2011421030</h5>
                    <h5>Company TIN Number: 008-893-471</h5>
                    <h4>ARUGA-KAPATID FOUNDATION INCORPORATED</h4>
                </div>
    
                <h3 style="text-align: center;">Aruga Kapatid Foundation Incorporated</h3>
                <h4 style="text-align: center;">Monthly Event Report ' . htmlspecialchars($searchRevent) . ' - ' . htmlspecialchars($searchR) . '</h4>
    
                <p>Date: ' . htmlspecialchars($currentDate) . '</p>
    
                <table>
                    <thead>
                        <tr>
                            <th>Last Name</th>
                            <th>First Name</th>
                            <th>Middle Name</th>
                            <th>Contact Number</th>
                            <th>Event</th>
                            <th>Preferred Date</th>
                            <th>Time</th>
                            <th>Equipment</th>
                            <th>Amount Raised</th>
                            <th>Outcomes</th>
                        </tr>
                    </thead>
                    <tbody>';
    
        // Loop through the data and append rows to the HTML table
        foreach ($data['acceptev'] as $acceptev) {
            $html .= '<tr>
                <td>' . htmlspecialchars($acceptev['lastname']) . '</td>
                <td>' . htmlspecialchars($acceptev['firstname']) . '</td>
                <td>' . htmlspecialchars($acceptev['middlename']) . '</td>
                <td>' . htmlspecialchars($acceptev['contactnum']) . '</td>
                <td>' . htmlspecialchars($acceptev['event']) . '</td>
                <td>' . htmlspecialchars($acceptev['prefferdate']) . '</td>
                <td>' . htmlspecialchars($acceptev['Time']) . '</td>
                <td>' . htmlspecialchars($acceptev['equipment']) . '</td>
                <td>' . htmlspecialchars(number_format($acceptev['amount_raised'], 2)) . '</td>
                <td>' . htmlspecialchars($acceptev['outcomes']) . '</td>
            </tr>';
        }
    
        // Close the HTML table and body
        $html .= '</tbody>
                </table>
                <p style="font-weight: 600;">Total Amount Raised: ' . number_format($totalAmountRaised, 2) . '</p>
                <p style="font-weight: 600;">Summary of Outcomes</p>
                <p>Health Awareness Workshop: Increased awareness on healthy lifestyle practices among participants.</p>
    
                <div class="acknowledgement">
                    <p>Acknowledgement</p>
                    <p>Thank you to all sponsors, volunteers, and attendees for their support and participation in the events.</p>
                </div>
    
                <div class="footer">
                    <p class="report">Report Generated By:</p>
                    <div class="signatures">
                        <p>Henry Dacanay III</p>
                        <p>Admin Staff</p>
                    </div>
                    <p class="report">Approved By:</p>
                    <div class="signatures">
                        <p>Lito Vergara</p>
                        <p>Administrator</p>
                    </div>
                </div>
            </body>
            </html>';
    
        // Load HTML content into Dompdf
        $dompdf->loadHtml($html);
    
        // Set paper size and orientation (optional)
        $dompdf->setPaper('A4', 'portrait');
    
        // Render PDF (optional: save to file or stream to browser)
        $dompdf->render();
    
        // Output the PDF as a string (inline display in the browser)
        $dompdf->stream('Event_Report.pdf', array('Attachment' => true));
    
        // Stop CodeIgniter from further processing (optional, but good practice)
        exit();
    }
     
    


    public function Decline()
    {
        $decline  = $this->request->getVar('decline');
        if(empty($decline))
        {
            return redirect()->to('canlendar')->with('msg', 'No Data to Insert');
        }
        $declineMe = $this->declineBook($decline);
                    $this->declineBooking($declineMe);
                    $this->removedeclinePending($decline);
            return redirect()->to('calendar');
    }
    private function declineBook($decline)
    {
        $acceptMe = $this->booking->where('bookingId', $decline)->get()->getResultArray();

        return $acceptMe;
    }


    private function declineBooking($declineMe)
    {

        if (empty($declineMe)) {
            return redirect()->to('canlendar')->with('msg', 'No Data to Insert');
        }
    
        $declineBookings = [];


        foreach($declineMe as $a)
        {
            $declineBookings[] = [
            'usersignsId' => $a['usersignsId'],
            'lastname' => $a['lastname'],
            'firstname' => $a['firstname'],
            'middlename' => $a['middlename'],
            'contactnum' => $a['contactnum'],
            'event' => $a['event'],
            'prefferdate' => $a['prefferdate'],
            'Time' => $a['Time'],
            'equipment' => $a['equipment'],
            'comments' => $a['comments'],
            'status' => 'Declined'
            ];
        }
        
        $this->book->InsertBatch($declineBookings);
    }

    private function removedeclinePending($decline)
    {
        $this->booking->where('bookingId', $decline)->delete();
    } 

    public function Archive()
    {
        $contacts = $this->request->getVar('update');

        $update = $this->scDetails($contacts);
                        $this->updateMyVisibility($update);
        return redirect()->to('/reports');
    }

    private function scDetails($contacts)
    {
        $update = $this->main->where('Id', $contacts)->first();

        return $update;

        
    }

    private function updateMyVisibility($update)
    {
        $data = [
            'scstatus' => 'Archive',
        ];

        $this->main->update($update, $data);
        
    }

    public function viewrepEvent()
{
    $data = [
        'prefdate' => $this->acceptev->findAll(),
        'notif' => $this->booking->where('status', 'pending')->first(),
            'getnotif' => $this->booking
                ->select('userbooking.bookingId, userbooking.lastname, userbooking.firstname, 
                    userbooking.middlename, userbooking.contactnum, userbooking.event, 
                    userbooking.time, userbooking.prefferdate, userbooking.equipment, 
                    userbooking.comments, userbooking.status, userbooking.usersignsId, 
                    user.userID, user.LastName, user.FirstName')
                ->join('user', 'user.userID = userbooking.usersignsId')
                ->where('userbooking.status', 'Accepted')
                ->orWhere('userbooking.status', 'Pending')
                ->findAll(),
            'countNotifs' => $this->booking->where('status', 'pending')->countAllResults()
    ];
    return view('dashboard/reportevent', $data);
}

public function searchRevent()
{
    // Get the fromdate and todate parameters from the request
    $searchRevent = $this->request->getVar('fromdate');
    $searchR = $this->request->getVar('todate');

    // Ensure the dates are in the correct format (YYYY-MM-DD) for database queries
    $fromDate = date('Y-m-d', strtotime($searchRevent));
    $toDate = date('Y-m-d', strtotime($searchR));

    $searchParams = [
        'regdate' => $fromDate,
        'todate' => $toDate
    ];
    
    // Fetching data where prefferdate falls between $fromDate and $toDate and status is 'Accepted'
    $acceptevData = $this->acceptev
        ->where('prefferdate >=', $fromDate)
        ->where('prefferdate <=', $toDate)
        ->where('status', 'Accepted')
        ->findAll();

    // Fetch other necessary data
    $notif = $this->booking->where('status', 'pending')->first();
    $getnotif = $this->booking
        ->select('userbooking.bookingId, userbooking.lastname, userbooking.firstname, 
            userbooking.middlename, userbooking.contactnum, userbooking.event, 
            userbooking.time, userbooking.prefferdate, userbooking.equipment, 
            userbooking.comments, userbooking.status, userbooking.usersignsId, 
            user.userID, user.LastName, user.FirstName')
        ->join('user', 'user.userID = userbooking.usersignsId')
        ->where('userbooking.status', 'Accepted')
        ->orWhere('userbooking.status', 'Pending')
        ->findAll();
    $countNotifs = $this->booking->where('status', 'pending')->countAllResults();

    // Prepare the data array
    $data = [
        'prefdate' => $this->acceptev->findAll(),
        'notif' => $notif,
        'getnotif' => $getnotif,
        'countNotifs' => $countNotifs,
        'acceptev' => $acceptevData,
        'regdate' => $fromDate,
        'todate' => $toDate
    ];

    // Check if data is found
    if (empty($data['acceptev'])) {
        // No data found, handle this situation here
        $data['no_data_message'] = 'No data found.';
    }

    return view('dashboard/reportTableEvents', $data);
}

}
