<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\UserbookingModel;
use App\Models\BookingModel;
use App\Models\MainModel;
use App\Models\AcceptbookingModel;
use App\Models\UserIdonateModel;
use Dompdf\Dompdf;  
class Fullcalendar extends BaseController
{
    private $userbooking;
    private $booking;
    private $uidm;
    private $book;
    private $main;
    private $acceptev;
    public function __construct()
    {
        $this->uidm = new userIdonateModel();
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
            'establishment' => $a['establishment'],
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

        $cdate = new \DateTime();
        foreach($data['reg'] as &$person)
        {
            $birthDate = new \DateTime($person['DateBirth']);
            $age = $cdate->diff($birthDate)->y;
            $person['age'] = $age;
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

    $cdate = new \DateTime();

    foreach($data['reg'] as &$person)
            {
                $birthDate = new \DateTime($person['DateBirth']);
                $age = $cdate->diff($birthDate)->y;
                $person['age'] = $age;
            }

        
        $dompdf = new Dompdf();
        $options = $dompdf->getOptions();
        $options->set('isRemoteEnabled', true); // Enable remote content
        $options->set('isHtml5ParserEnabled', true); // Enable HTML5 parsing
        $dompdf->setOptions($options);
        $currentDate = date('Y-m-d'); // Get the current date in 'YYYY-MM-DD' format
       
        // Define the HTML content
     // Define the HTML content
     $html = '
     <html>
<head>
<style>
     body {
         font-family: Arial, sans-serif;
         margin: 0;
         padding: 0;
     }
     .header {
         text-align: center;
         position: relative;
     }
     .header img {
         position: absolute;
         left: 0;
         top: 0;
         height: 120px;
     }
     .header h5 {
         margin: 0;
     }
     .title {
         text-align: center;
     }
     .title h3, .title h4 {
         margin: 0;
     }
     .report-info {
         margin: 20px 0;
     }
     .summary {
         font-weight: 600;
         margin-top: 20px;
     }
     .footer {
         margin-top: 40px;
     }
     .footer .signature-group {
         display: flex;
         justify-content: space-between;
         margin-top: 50px;
     }
     .footer .signature-section {
         width: 20%;
         text-align: center;
     }
     .footer .signature-section p {
         margin: 5px 0;
     }
     .footer .signature-line {
         border-top: 1px solid black;
         margin-top: 40px;
         margin-bottom: 5px;
     }
     
     /* Add this CSS style for table cells */
         .table {
 width: 100%;
 border-collapse: collapse;

}

     .table th, .table td {
         border: 1px solid black;
         padding: 4px; /* Reduced padding for more compactness */
         text-align: left;
         font-size: 9px; /* Further reduced font size to fit content */
         word-wrap: break-word;
         white-space: nowrap; /* Prevent word wrapping, keep content in one line */
         overflow: hidden; 
         text-overflow: ellipsis; /* Show ellipsis when content overflows */
     }

     /* Specific column widths */
     .table th:nth-child(1), .table td:nth-child(1) {
         width: 10%; /* Last Name */
     }

     .table th:nth-child(2), .table td:nth-child(2) {
         width: 10%; /* First Name */
     }

     .table th:nth-child(3), .table td:nth-child(3) {
         width: 10%; /* Middle Name */
     }

     .table th:nth-child(4), .table td:nth-child(4) {
         width: 8%; /* Nickname */
     }

     .table th:nth-child(5), .table td:nth-child(5) {
         width: 8%; /* Date of Birth */
     }

     .table th:nth-child(6), .table td:nth-child(6) {
         width: 6%; /* Gender */
     }

     .table th:nth-child(7), .table td:nth-child(7) {
         width: 8%; /* Marital Status */
     }

     .table th:nth-child(8), .table td:nth-child(8) {
         width: 8%; /* Contact Number */
     }

     .table th:nth-child(9), .table td:nth-child(9) {
         width: 12%; /* Address */
     }

     .table th:nth-child(10), .table td:nth-child(10) {
         width: 8%; /* Registration Date */
     }

     .table th:nth-child(11), .table td:nth-child(11) {
         width: 8%; /* Date of Death */
     }

     .table th:nth-child(12), .table td:nth-child(12) {
         width: 10%; /* Cause of Death */
     }
             
</style>
</head>
<body>
         <div class="header" style="font-size:16px;">
             <h5>Republic of the Philippines</h5>
             <h5>Province of Oriental Mindoro</h5>
             <h5>Barangay Managpi, Calapan City</h5>
             <h5>HAPAG ARUGA FOUNDATION INCORPORATED</h5>
         </div>
         <br>
    <div class="title">
             <h4 style="font-size:15px;">LIST OF ELDERS</h4>
         </div>

<div class="report-info">
 <p>Date: ' . date('F j, Y', strtotime($currentDate)) . '</p>
 <p>Reporting Period: ' . date('F j, Y', strtotime($closestLowerDate)) . ' - ' . date('F j, Y', strtotime($search)) . '</p>
  </div>
 <table  class="table">
     <thead>
         <tr>
             <th>Last Name</th>
             <th>First Name</th>
             <th>Middle Name</th>
             <th>Nickname</th>
             <th>Date of Birth</th>
             <th>Age</th>
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
     <td>' . $reg['age'] . '</td>
     <td>' . $reg['gender'] . '</td>
     <td>' . $reg['marital_stat'] . '</td>
     <td>' . $reg['ContNum'] . '</td>
     <td>' . $reg['EmergencyAdd'] . '</td>
     <td>' . $reg['RegDate'] . '</td>
 </tr>';
     }
         
     // Close the HTML table and body
     $html .= '</tbody></table>

 <p class="summary">Summary</p>
     <p>During the reporting period, a total of '. $count .' elderly individuals were registered in the Elder Care Program of Hapag Aruga Foundation Incorporated.</p>
     <div style="display: flex; justify-content: flex-start; margin-top: 40px;">
            <div style="text-align: center; width: 200px;">
                <p style="margin: 5px 0 0 0; font-size: 14px;">LITO C. VERGARA</p>
                <div style="border-bottom: 1px solid black; width: 100%; margin: 5px 0;"></div>
                <p style="margin: 5px 0 0 0; font-size: 14px;">Administrator</p>
            </div>
        </div>
    </div>

     </body>
     </html>';

     

        
        // Load HTML content into Dompdf
        $dompdf->loadHtml($html);
        
        // Set paper size and orientation (optional)
        $dompdf->setPaper('A4', 'landscape');
        
        // Render PDF (optional: save to file or stream to browser)
        $dompdf->render();
        
        $dompdf->stream('Elderly_Report.pdf', array('Attachment' => 0));
        
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

        $cdate = new \DateTime();

        foreach($data['reg'] as &$person)
               {
                   $birthDate = new \DateTime($person['DateBirth']);
                   $age = $cdate->diff($birthDate)->y;
                   $person['age'] = $age;
               }

        return view('dashboard/preview', $data);
    }

    public function previewleft2()
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
        $closestLowerRecord = $this->main
        ->where('scstatus', 'Left')
        ->orderBy('departuredate', 'ASC')
        ->first(); 

        $LatestDate = $this->main
        ->where('scstatus', 'Left')
        ->orderBy('departuredate', 'DESC')
        ->first(); 
        $closestLowerDate = $closestLowerRecord ? $closestLowerRecord['departuredate'] : 'N/A'; 
        $latestdepDate = $LatestDate ? $LatestDate['departuredate'] : 'N/A'; 
        // Fetch data from the model
        $data = [
            'booking' => $this->main->findAll(), // Fetching all data from the model
            'reg' => $this->main
                            ->where('scstatus', 'Left')
                            ->find(), // Fetching data where RegistrationDate falls between $searchRes and $search
            'closestLowerRecord' => $closestLowerDate,    
            'count' => $this->main
            ->where('scstatus', 'Left')
            ->countAllResults(),
            'currentDate' => date('Y-m-d'),
            'LatestDate' => $latestdepDate
           
        ];


        foreach($data['reg'] as &$person)
        {
            $birthDate = new \DateTime($person['DateBirth']);
            $LeftDate = new \DateTime($person['departuredate']);
            $age = $LeftDate->diff($birthDate)->y;
            $person['age'] = $age;
        }

        return view('dashboard/previewLeft2', $data);
    }


    public function previewLeft($search, $tosearch)
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
            ->where('scstatus', 'Left')
            ->orderBy('RegDate', 'ASC')
            ->first();  // Getting the record with the closest lower date
        // Fetch data from the model
        $data = [
            'booking' => $this->main->findAll(), // Fetching all data from the model
            'reg' => $this->main->where('departuredate >=', $search)->where('departuredate <=', $tosearch)
                                 ->where('scstatus', 'Left')
                                 ->find(), // Fetching data where RegistrationDate falls between $searchRes and $search
            
            'closestLowerDate' =>  $closestLowerRecord ? $closestLowerRecord['RegDate'] : 'N/A',
            'count' => $this->main->where('departuredate >=', $search)->where('departuredate <=', $tosearch)
            ->where('scstatus', 'Left')
            ->countAllResults(),
            'currentDate' => date('Y-m-d'),
            'search' => $search,
            'tosearch' => $tosearch
        ];

        $cdate = new \DateTime();
       foreach($data['reg'] as &$person)
       {
           $birthDate = new \DateTime($person['DateBirth']);
           $LeftDate = new \DateTime($person['departuredate']);
           $age = $LeftDate->diff($birthDate)->y;
           $person['age'] = $age;
       }

        return view('dashboard/previewLeft', $data);
    }

    public function previewDeath2()
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
        $closestLowerRecord = $this->main
            ->where('scstatus', 'Deceased')
            ->orderBy('datedeath', 'ASC')
            ->first(); 

            $latest = $this->main
    ->where('scstatus', 'Deceased')
    ->orderBy('datedeath', 'DESC') // Ordering by date of death, descending order
    ->first(); // Get the most recent record

// Getting the last death date
$lastDeathDate = $latest ? $latest['datedeath'] : 'N/A'; 

        $data = [
            'booking' => $this->main->findAll(), // Fetching all data from the model
            'reg' => $this->main->where('scstatus', 'Deceased')->findAll(),
            'closestLowerDate' =>  $closestLowerRecord ? $closestLowerRecord['datedeath'] : 'N/A',
            'count' => $this->main->where('scstatus', 'Deceased')
            ->countAllResults(),
            'currentDate' => date('Y-m-d'),
            'LatestDeath' => $lastDeathDate
        ];

        foreach($data['reg'] as &$person)
        {
            $birthDate = new \DateTime($person['DateBirth']);
            $deathDate = new \DateTime($person['datedeath']);
            $age = $deathDate->diff($birthDate)->y;
            $person['age'] = $age;
        }


        return view('dashboard/previewDeath2', $data);
    }

    public function previewDeath($search, $tosearch)
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
        $closestLowerRecord = $this->main->where('datedeath <=', $search)
            ->where('scstatus', 'Deceased')
            ->orderBy('RegDate', 'ASC')
            ->first();  // Getting the record with the closest lower date
        // Fetch data from the model
        $data = [
            'booking' => $this->main->findAll(), // Fetching all data from the model
            'reg' => $this->main->where('scstatus', 'Deceased')->where('datedeath >=', $search)->where('datedeath <=', $tosearch)->findAll(),
            'closestLowerDate' =>  $closestLowerRecord ? $closestLowerRecord['RegDate'] : 'N/A',
            'count' => $this->main->where('scstatus', 'Deceased')->where('datedeath >=', $search)->where('datedeath <=', $tosearch)
            ->countAllResults(),
            'currentDate' => date('Y-m-d'),
            'search' => $search,
            'tosearch' => $tosearch
        ];

        $cdate = new \DateTime();
       foreach($data['reg'] as &$person)
       {
           $birthDate = new \DateTime($person['DateBirth']);
           $deathDate = new \DateTime($person['datedeath']);
           $age = $deathDate->diff($birthDate)->y;
           $person['age'] = $age;
       }

        return view('dashboard/previewDeath', $data);
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
            margin: 0;
            padding: 0;
        }
        .header {
            text-align: center;
            position: relative;
        }
        .header img {
            position: absolute;
            left: 0;
            top: 0;
            height: 120px;
        }
        .header h5 {
            margin: 0;
        }
        .title {
            text-align: center;
        }
        .title h3, .title h4 {
            margin: 0;
        }
        .report-info {
            margin: 20px 0;
        }
        
        .summary {
            font-weight: 600;
            margin-top: 20px;
        }
        .footer {
            margin-top: 40px;
        }
        .footer .signature-group {
            display: flex;
            justify-content: space-between;
            margin-top: 50px;
        }
        .footer .signature-section {
            width: 20%;
            text-align: center;
        }
        .footer .signature-section p {
            margin: 5px 0;
        }
        .footer .signature-line {
            border-top: 1px solid black;
            margin-top: 40px;
            margin-bottom: 5px;
        }
        
        /* Add this CSS style for table cells */

.table {
    width: 100%;
    border-collapse: collapse;

}

.table th, .table td {
    border: 1px solid black;
    padding: 4px; /* Reduced padding for more compactness */
    text-align: left;
    font-size: 9px; /* Further reduced font size to fit content */
    word-wrap: break-word;
    white-space: nowrap; /* Prevent word wrapping, keep content in one line */
    overflow: hidden; 
    text-overflow: ellipsis; /* Show ellipsis when content overflows */
}

/* Specific column widths */
.table th:nth-child(1), .table td:nth-child(1) {
    width: 10%; /* Last Name */
}

.table th:nth-child(2), .table td:nth-child(2) {
    width: 10%; /* First Name */
}

.table th:nth-child(3), .table td:nth-child(3) {
    width: 10%; /* Middle Name */
}

.table th:nth-child(4), .table td:nth-child(4) {
    width: 8%; /* Nickname */
}

.table th:nth-child(5), .table td:nth-child(5) {
    width: 8%; /* Date of Birth */
}

.table th:nth-child(6), .table td:nth-child(6) {
    width: 6%; /* Gender */
}

.table th:nth-child(7), .table td:nth-child(7) {
    width: 8%; /* Marital Status */
}

.table th:nth-child(8), .table td:nth-child(8) {
    width: 8%; /* Contact Number */
}

.table th:nth-child(9), .table td:nth-child(9) {
    width: 12%; /* Address */
}

.table th:nth-child(10), .table td:nth-child(10) {
    width: 8%; /* Registration Date */
}

.table th:nth-child(11), .table td:nth-child(11) {
    width: 8%; /* Date of Death */
}

.table th:nth-child(12), .table td:nth-child(12) {
    width: 10%; /* Cause of Death */
}

        </style>
        </head>
        <body>
            <div class="header" style="font-size:1rem;">

                <h5>Republic of the Philippines</h5>
                <h5>Province of Oriental Mindoro</h5>
                <h5>Barangay Managpi, Calapan City</h5>
                <h5>HAPAG ARUGA FOUNDATION INCORPORATED</h5>
            </div>
                <br>
            <div class="title">
                <h3 style="font-size:15px;">LIST OF EVENTS</h3>

            </div>

            
  <div class="report-info">
                <p>Date: ' . Date('F j, Y',strtotime($currentDate)) . '</p>
                <p>Reporting Period: '. date('F j, Y', strtotime($searchRevent)) .' - '. date('F j, Y',strtotime($searchR)) . '</p>
            </div>
          
            <table class="table">
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

        $html .= '</tbody></table>

              <p style="font-weight: 600;">Total Amount Raised: ' . number_format($totalAmountRaised, 2) . '</p>
         <div style="display: flex; justify-content: flex-start; margin-top: 40px;">
            <div style="text-align: center; width: 200px;">
                <p style="margin: 5px 0 0 0; font-size: 14px;">LITO C. VERGARA</p>
                <div style="border-bottom: 1px solid black; width: 100%; margin: 5px 0;"></div>
                <p style="margin: 5px 0 0 0; font-size: 14px;">Administrator</p>
            </div>
        </div>
        </div>
        </div>
        </body>
        </html>';

        // Load HTML content into Dompdf
        $dompdf->loadHtml($html);
    
        // Set paper size and orientation (optional)
        $dompdf->setPaper('A4', 'landscape');
    
        // Render PDF (optional: save to file or stream to browser)
        $dompdf->render();
    
        // Output the PDF as a string (inline display in the browser)
        $dompdf->stream('Event_Report.pdf', array('Attachment' => 0));
    
        // Stop CodeIgniter from further processing (optional, but good practice)
        exit();
    }
    
     
    


    public function Decline()
    {
        $decline  = $this->request->getVar('decline');
        $reasonToDecline = $this->request->getPost('declineReason');

        if(empty($decline))
        {
            return redirect()->to('canlendar')->with('msg', 'No Data to Insert');
        }

        $declineMe = $this->declineBook($decline);
           $this->declineBooking($declineMe, $reasonToDecline);
                    $this->removedeclinePending($decline);
            return redirect()->to('calendar');
    }
    private function declineBook($decline)
    {
        $acceptMe = $this->booking->where('bookingId', $decline)->get()->getResultArray();

        return $acceptMe;
    }


    private function declineBooking($declineMe, $reasonToDecline)
    {

        if (empty($declineMe)) {
            return redirect()->to('canlendar')->with('msg', 'No Data to Insert');
        }
    
        $declineBookings = [];


        foreach($declineMe as $a)
        {
            $declineBookings[] = [
            'usersignsId' => $a['usersignsId'],
            'establishment' => $a['establishment'],
            'lastname' => $a['lastname'],
            'firstname' => $a['firstname'],
            'middlename' => $a['middlename'],
            'contactnum' => $a['contactnum'],
            'event' => $a['event'],
            'prefferdate' => $a['prefferdate'],
            'Time' => $a['Time'],
            'equipment' => $a['equipment'],
            'comments' => $a['comments'],
            'status' => 'Declined',
            'reason' => $reasonToDecline
            ];
        }
        

        // var_dump($declineBookings);
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
public function previewMonetary($fromdate, $todate)
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
    
   
    $totals = $this->uidm
    ->select('SUM(cashDonation) as total_cash_donation, SUM(cashCheck) as total_cash_check, SUM(mumosahapag) as total_mumosahapag')
    ->where('DATE(donationdate) >=', $fromdate)
    ->where('DATE(donationdate) <=', $todate)
    ->where('status', 'Received')
    ->first();

    $count = $this->uidm
                  ->where('DATE(donationdate) >=', $fromdate)
                  ->where('DATE(donationdate) <=', $todate)
                  ->countAllResults();

    $data = [
        'currentDate' => date('Y-m-d'),
        'totals' => $totals,
        'count' => $count,
        'fromdate' => $fromdate,
        'todate'   => $todate, 
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
            'countNotifs' => $this->userbooking->where('status', 'pending')->countAllResults(),

            'Monetary' =>  $this->uidm->select('user.userID, user.Email, 
            userdonation.id, userdonation.usersignsId, userdonation.lastname, userdonation.firstname, userdonation.mumosahapag, 
            userdonation.middlename, userdonation.contactnum, userdonation.donationdate, userdonation.establishment, userdonation.cashDonation,userdonation.cashCheck, 
            userdonation.picture, userdonation.referencenum, userdonation.message,userdonation.status')
            
            ->join('user', 'user.userID = userdonation.usersignsId')->where('DATE(donationdate) >=', $fromdate)
                                     ->where('DATE(donationdate) <=', $todate)
                                     ->where('status', 'Received')
                                     ->findAll(),
    ];

    return view('dashboard/previewMonetary', $data);

}

public function previewEvent($fromDate, $toDate)
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
    
    // Format the dates
    $fromDate = date('Y-m-d', strtotime($fromDate));
    $toDate = date('Y-m-d', strtotime($toDate));
    
    // Fetch necessary data
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

    // Fetch accepted events between the specified dates
    $acceptevData = $this->acceptev
        ->where('prefferdate >=', $fromDate)
        ->where('prefferdate <=', $toDate)
        ->where('status', 'Accepted')
        ->findAll();

    $totalAmountRaised = 0;
    foreach ($acceptevData as $acceptev) {
        $totalAmountRaised += $acceptev['amount_raised'];
    }
    
    $data = [
        'prefdate' => $acceptevData,
        'notif' => $notif,
        'getnotif' => $getnotif,
        'countNotifs' => $countNotifs,
        'acceptev' => $acceptevData,
        'search' => $fromDate,
        'currentDate' => date('Y-m-d'),
        'tosearch' => $toDate,
        'totalAmountRaised' => $totalAmountRaised,
        'imageSrc' => $imageSrc  // Add imageSrc to the data array
    ];

    return view('dashboard/previewEvent', $data);
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
