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
        // Fetch data from the model
        $data = [
            'booking' => $this->main->findAll(), // Fetching all data from the model
            'reg' => $this->main->where('RegDate <=', $search)
                                 ->where('scstatus', 'Unarchive')
                                 ->find() // Fetching data where RegistrationDate falls between $searchRes and $search
        ];

        $count = $this->main->where('RegDate <=', $search)
                            ->where('scstatus', 'Unarchive')
                            ->countAllResults();

        
        $dompdf = new Dompdf();
        $currentDate = date('Y-m-d'); // Get the current date in 'YYYY-MM-DD' format
       
        // Define the HTML content
        $html = '
        <html>
        <head>
        </head>
        <body >
            <div style="text-align: center;">
           
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
            <p>Reporting Period: This is the reporting date less than ' . $search . '</p>
            
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

        <div style="position:absolute;bottom:2rem;left:0;">
        <p style="font-weight:600;">Report Generated By:</p>

       <div style="display:flex;flex-direction:column;">
       <p>Henry Dacanay III</p>
       <p>Admin Staff</p>
       </div>

       <p style="font-weight:600;">Approved By:</p>

       <div style="display:flex;flex-direction:column;">
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

    public function generateEventReport($searchRevent, $searchR)
    {
        $searchRevent = str_replace('-', '/', $searchRevent);
        $searchR = str_replace('-', '/', $searchR);
       
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
        $currentDate = date('Y-m-d'); // Get the current date in 'YYYY-MM-DD' format
        
    
        // Define the HTML content
        $html = '
            <html>
            <head>
            </head>
            <body>
                <div style="text-align: center;">
                    <h5 style="margin: 0;">Republic of the Philippines</h5>
                    <h5 style="margin: 0;">Province of Oriental Mindoro</h5>
                    <h5 style="margin: 0;">Barangay Managpi, Calapan City</h5>
                    <h5 style="margin: 0;">Company Registration Number: CN2011421030</h5>
                    <h5 style="margin: 0;">Company TIN Number: 008-893-471</h5>
                    <h4 style="margin: 0; padding-top: 5px;">ARUGA-KAPATID FOUNDATION INCORPORATED</h4>
                </div>
    
                <h3 style="text-align: center;">Aruga Kapatid Foundation Incorporated</h3>
                <h4 style="text-align: center;">Monthly Event Report '. $currentDate .'</h4>
    
                <p>Date: ' . $currentDate . '</p>
                
                <table border="1" style="border-collapse: collapse; border: 1px solid black;">
                    <thead>
                        <tr>
                            <th>Last Name</th>
                            <th>First Name</th>
                            <th>Middle Name</th>
                            <th>Contact Number</th>
                            <th>Event</th>
                            <th>Preffer Date</th>
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
                <td>' . $acceptev['lastname'] . '</td>
                <td>' . $acceptev['firstname'] . '</td>
                <td>' . $acceptev['middlename'] . '</td>
                <td>' . $acceptev['contactnum'] . '</td>
                <td>' . $acceptev['event'] . '</td>
                <td>' . $acceptev['prefferdate'] . '</td>
                <td>' . $acceptev['Time'] . '</td>
                <td>' . $acceptev['equipment'] . '</td>
                <td>' . $acceptev['amount_raised'] . '</td>
                <td>' . $acceptev['outcomes'] . '</td>
            </tr>';
        }
    
        // Close the HTML table and body
        $html .= '</tbody></table>
            <p style="font-weight:600;>Total Amount Raised: '.number_format($totalAmountRaised, 2).'</p>
            <p style="font-weight:600;>Summary of Outcomes</p>
            <p>Health Awareness Workshop:Increased awareness on healthy lifestyle practices among participants.</p>

            <p style="font-weight:600;>Acknowledgement</p>
            <p>Thank you to all sponsors, volunteers, and attendees for their support and participation in the events.</p>
    
            <div style="position:absolute;bottom:2rem;left:0;">
                <p style="font-weight:600;">Report Generated By:</p>
                <div style="display:flex;flex-direction:column;">
                    <p>Henry Dacanay III</p>
                    <p>Admin Staff</p>
                </div>
                <p style="font-weight:600;">Approved By:</p>
                <div style="display:flex;flex-direction:column;">
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
    $searchRevent = $this->request->getVar('fromdate');
    $searchR = $this->request->getVar('todate');

    $searchParams = [
        'regdate' => $searchRevent,
        'todate' => $searchR
    ];
    
    // Fetching data where prefferdate falls between $searchRevent and $searchR and status is 'Accepted'
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
            'countNotifs' => $this->booking->where('status', 'pending')->countAllResults(),
        'acceptev' => $this->acceptev->where('prefferdate >=', $searchRevent)
                                     ->where('prefferdate <=', $searchR)
                                     ->where('status', 'Accepted')
                                     ->findAll(),
                                     'searchParams' => $searchParams
    ];
    
    // Check if data is found
    if (!empty($data['acceptev'])) {
      
    } else {
        // No data found, handle this situation here
        // For example, you can set a message to display in the view
        $data['no_data_message'] = 'No data found.';
    }
    return view('dashboard/reportTableEvents', $data);
}
}
