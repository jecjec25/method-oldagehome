<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\MainModel;
use App\Models\UserIdonateModel;
use App\Models\ProductsModel;
use App\Models\UserModel;
use App\Controllers\ViewController;
use App\Models\UserbookingModel;
use App\Models\AdmissionslipModel;
use CodeIgniter\RESTful\ResourceController;
use Dompdf\Dompdf;  
class NewController extends BaseController
{
    private $main;
    private $userbooking;
    private $uidm;
    private $admissionslip;

    public function __construct()
    {
        $this->uidm = new userIdonateModel();
        $this->userbooking = new UserbookingModel();
        $this->main = new MainModel();
        $this->admissionslip = new AdmissionslipModel();
    }
    public function test()
    {
        $sortOption = $this->request->getGet('sort');
        $main = new MainModel();

        switch ($sortOption) {
            case 'az':
                $data['main'] = $main->where('scstatus', 'Unarchive')->orderBy('lastname', 'ASC')->findAll();
                break;
            case 'za':
                $data['main'] = $main->where('scstatus', 'Unarchive')->orderBy('lastname', 'DESC')->findAll();
                break;
            case 'date_asc':
                $data['main'] = $main->where('scstatus', 'Unarchive')->orderBy('RegDate', 'ASC')->findAll(); 
                break;
            case 'date_desc':
                $data['main'] = $main->where('scstatus', 'Unarchive')->orderBy('RegDate', 'DESC')->findAll(); 
                break;
            default:
                $data['main'] = $main->where('scstatus', 'Unarchive')->findAll();
                $sortOption = ''; 
                break;
        }

        $cdate = new \DateTime();

        foreach($data['main'] as &$person)
        {
            $birthDate = new \DateTime($person['DateBirth']);
            $age = $cdate->diff($birthDate)->y;
            $person['age'] = $age;
        }

        $data['sortOption'] = $sortOption;
    
        $data['notif'] = $this->userbooking->where('status', 'pending')->first();
        $data['getnotif'] = $this->userbooking
            ->select('userbooking.bookingId, userbooking.lastname, userbooking.firstname, 
                        userbooking.middlename, userbooking.contactnum, userbooking.event, 
                        userbooking.time, userbooking.prefferdate, userbooking.equipment, 
                        userbooking.comments, userbooking.status, userbooking.usersignsId, 
                        user.userID, user.LastName, user.FirstName')
            ->join('user', 'user.userID = userbooking.usersignsId')
            ->where('userbooking.status', 'Accepted')
            ->orWhere('userbooking.status', 'Pending')
            ->findAll();
    
        $data['countNotifs'] = $this->userbooking->where('status', 'pending')->countAllResults();
    
        return view('dashboard/managescdetails', $data);
    }

    public function archives()
    {
        $data = [
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
            'countNotifs' => $this->userbooking->where('status', 'pending')->countAllResults()
        ];
       $data['main']= $this->main->where('scstatus', 'Left')->findAll();

       $cdate = new \DateTime();
       foreach($data['main'] as &$person)
       {
           $birthDate = new \DateTime($person['DateBirth']);
           $LeftDate = new \DateTime($person['departuredate']);
           $age = $LeftDate->diff($birthDate)->y;
           $person['age'] = $age;
       }
       
        return view('dashboard/scarchived', $data);
    }

    public function deleteleftElder($Id = null)
    {
        $main = new MainModel();
        $data = $main->where('Id', $Id)->delete($Id);
        return $this->response->redirect(site_url('/archives'));
    }

    public function generateElderlyLeft()
    {
        set_time_limit(120);

        $namesig = $this->request->getVar('signatoryName');
        $namepos = $this->request->getVar('positionName');
        
        // Use local file path for the image
        $imagePath = $_SERVER['DOCUMENT_ROOT'] . '/LogoHapagAruga.png';
        if (file_exists($imagePath)) {
            $imageData = base64_encode(file_get_contents($imagePath));
            $imageSrc = 'data:image/jpeg;base64,' . $imageData;
        } else {
            die('Image not found.');
        }
       
        $data['main']= $this->main->where('scstatus', 'Left')->findAll();
        $closestLowerRecord = $this->main
        ->where('scstatus', 'Left')
        ->orderBy('departuredate', 'ASC')
        ->first();

        $LatestDate = $this->main
        ->where('scstatus', 'Left')
        ->orderBy('departuredate', 'DESC')
        ->first();

        foreach($data['main'] as &$person)
        {
            $birthDate = new \DateTime($person['DateBirth']);
            $LeftDate = new \DateTime($person['departuredate']);
            $age = $LeftDate->diff($birthDate)->y;
            $person['age'] = $age;
        }

        $closestLowerDate = $closestLowerRecord ? $closestLowerRecord['departuredate'] : 'N/A'; 
        $LatestDates = $LatestDate ? $LatestDate['departuredate'] : 'N/A'; 

        $count = $this->main->where('scstatus', 'Left')
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
                <h3 style="font-size:15px;">LIST OF ELDERS (LEFT)</h3>
            </div>

            <div class="report-info">
                <p>Date: ' . date('F j, Y',strtotime($currentDate)) . '</p>
                <p>Reporting Period: '. date('F j, Y', strtotime($closestLowerDate)) .' - '. date('F j, Y',strtotime($LatestDates)) . '</p>
            </div>
            
            <table class="table">
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
                        <th>Departure Date</th>
                        <th>Reason</th>
                    </tr>
                </thead>
                <tbody>';

        foreach ($data['main'] as $reg) {
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
                <td>' . $reg['departuredate'] . '</td>
                <td>' . $reg['reasonleft'] . '</td>
            </tr>';
        }

        $html .= '</tbody></table>

        <p class="summary">Summary</p>
        <p>During the reporting period, a total of '. $count.' elderly individuals left the Elder Care Program of Hapag Aruga Foundation Incorporated.</p>

       <div style="display: flex; justify-content: flex-start; margin-top: 40px;">
            <div style="text-align: center; width: 200px;">
                <p style="margin: 5px 0 0 0; font-size: 14px;">'. $namesig .'</p>
                <div style="border-bottom: 1px solid black; width: 100%; margin: 5px 0;"></div>
                <p style="margin: 5px 0 0 0; font-size: 14px;">'. $namepos.'</p>
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
        $dompdf->stream('Elderly_Left_Report.pdf', array('Attachment' => 0));

        // Stop CodeIgniter from further processing (optional, but good practice)
        exit();

    }

    public function archivesdeceased()
    {
        $data = [
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
            'countNotifs' => $this->userbooking->where('status', 'pending')->countAllResults()
        ];
       $data['main']= $this->main->where('scstatus','Deceased')->findAll();

       $cdate = new \DateTime();
       foreach($data['main'] as &$person)
       {
           $birthDate = new \DateTime($person['DateBirth']);
           $deathDate = new \DateTime($person['datedeath']);
           $age = $deathDate->diff($birthDate)->y;
           $person['age'] = $age;
       }
        return view('dashboard/scarchivedeceased', $data);
    }

    public function deletedeceasedElder($Id = null)
    {
        $main = new MainModel();
        $data = $main->where('Id', $Id)->delete($Id);
        return $this->response->redirect(site_url('/archivesdeceased'));
    }

    public function generateElderlyDeceased()
    {
        set_time_limit(120);

        $namesig = $this->request->getVar('signatoryName');
        $namepos = $this->request->getVar('positionName');
        
        // Use local file path for the image
        $imagePath = $_SERVER['DOCUMENT_ROOT'] . '/LogoHapagAruga.png';
        if (file_exists($imagePath)) {
            $imageData = base64_encode(file_get_contents($imagePath));
            $imageSrc = 'data:image/jpeg;base64,' . $imageData;
        } else {
            die('Image not found.');
        }
       
        $data['main']= $this->main->where('scstatus', 'Deceased')->findAll();

        $closestLowerRecord = $this->main
        ->where('scstatus', 'Deceased')
        ->orderBy('datedeath', 'ASC')
        ->first(); // Getting the record with the closest lower date

        $latest = $this->main
        ->where('scstatus', 'Deceased')
        ->orderBy('datedeath', 'DESC')
        ->first(); // Getting the record with the closest lower date

        $closestLowerDate = $closestLowerRecord ? $closestLowerRecord['datedeath'] : 'N/A'; 

        $LatestDeath = $latest ? $latest['datedeath'] : 'N/A'; 

        $count = $this->main->where('scstatus', 'Deceased')
                            ->countAllResults();

        foreach($data['main'] as &$person)
        {
            $birthDate = new \DateTime($person['DateBirth']);
            $deathDate = new \DateTime($person['datedeath']);
            $age = $deathDate->diff($birthDate)->y;
            $person['age'] = $age;
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
                <h3 style="font-size:15px;">LIST OF ELDERS (DECEASED)</h3>

            </div>

            <div class="report-info">
                <p>Date: ' . Date('F j, Y',strtotime($currentDate)) . '</p>
                <p>Reporting Period: '. date('F j, Y', strtotime($closestLowerDate)) .' - '. date('F j, Y',strtotime($LatestDeath)) . '</p>
            </div>
            
            <table class="table">
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
                        <th>Date of Death</th>
                        <th>Cause</th>
                    </tr>
                </thead>
                <tbody>';

        foreach ($data['main'] as $reg) {
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
                <td>' . $reg['datedeath'] . '</td>
                <td>' . $reg['causedeath'] . '</td>
            </tr>';
        }

        $html .= '</tbody></table>

        <p class="summary">Summary</p>
        <p>During the reporting period, a total of '. $count.' elderly individuals passed away in the Elder Care Program of Hapag Aruga Foundation Incorporated.</p>
        <div style="display: flex; justify-content: flex-start; margin-top: 40px;">
            <div style="text-align: center; width: 200px;">
                <p style="margin: 5px 0 0 0; font-size: 14px;">'. $namesig .'</p>
                <div style="border-bottom: 1px solid black; width: 100%; margin: 5px 0;"></div>
                <p style="margin: 5px 0 0 0; font-size: 14px;">'. $namepos.'</p>
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
        $dompdf->stream('Elderly_Deceased_Report.pdf', array('Attachment' => 0));

        // Stop CodeIgniter from further processing (optional, but good practice)
        exit();
  
    }

    public function save()
    {
        
        $session = session();

        $id = $this->request->getPost('Id');
        $data = [
            'lastname' => $this->request->getPost('lastname'),
            'firstname' => $this->request->getPost('firstname'),
            'middlename' => $this->request->getPost('middlename'),
            'nickname' => $this->request->getPost('nickname'),
            'DateBirth' => $this->request->getPost('DateBirth'),
            'gender' => $this->request->getPost('gender'),
            'marital_stat' => $this->request->getPost('marital_stat'),
            'ContNum' => $this->request->getPost('ContNum'),
            'ComAdd' => $this->request->getPost('ComAdd'),
            'EmergencyAdd' => $this->request->getPost('EmergencyAdd'),
            'EmergencyContNum' => $this->request->getPost('EmergencyContNum'),
            'RegDate' => $this->request->getPost('RegDate'),
            'scstatus' => 'Unarchive',
            'adminId' => $this->request->getPost('adminId')
        ];
        
        $picture = $this->request->getFile('ProfPic');
        $imagePath = $_SERVER['DOCUMENT_ROOT'];
        
        if ($picture && $picture->isValid() && !$picture->hasMoved()) {
            // Handle file upload
            $newFileName = $picture->getRandomName();
            $picture->move($imagePath . '/upload/seniors/', $newFileName);
            $data['ProfPic'] = $newFileName;
        } 
        
        $main = new MainModel();
        if (!empty($id)) {
            $main->update($id, $data);
        } else {
           
        $main->save($data);
        return redirect()->to('/test');
        }


    }
    public function edit($Id)
    {

         // Fetch the user data from the database
         $data = [
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
            'countNotifs' => $this->userbooking->where('status', 'pending')->countAllResults()
        ];
    $data['d'] = $this->main->find($Id);

    // Check if the user exists
    if ($data) {
        
        // Load the edit view and pass the user data
        return view('dashboard/editscdetails', $data);
    } else {
        // User not found
        throw new \CodeIgniter\Exceptions\PageNotFoundException('User not found');
    }
    }

    public function searchsc()
    {
        $search = $this->request->getVar('searchsc');


        if($search)
        {
            $data = [
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
                'countNotifs' => $this->userbooking->where('status', 'pending')->countAllResults()
            ];
            $data['main'] = $this->main->like('lastname', $search)->where('scstatus','Unarchive')->findAll();
            return view('dashboard/search',$data);
        }
    }
    public function Archive()
    {
        $contacts = $this->request->getVar('update');

        $update = $this->scDetails($contacts);
        $this->updateMyVisibility($update);
        return redirect()->to('/test');
    }

    private function scDetails($contacts)
    {
        $update = $this->main->where('Id', $contacts)->first();

        return $update;
    }

    private function updateMyVisibility($update)
    {
        if (empty($this->request->getVar('status'))) {
            // Set flashdata with an error message
            session()->setFlashdata('error', 'Please select status');
    
            // Redirect back to the previous page (or a specific page)
            return redirect()->back();
        }

        else{
            $data = [
            'scstatus' => $this->request->getVar('status'),
        ];

        $this->main->update($update, $data);
        
           } 
      }

    public function update($id)
    {
        $main = new MainModel();
        

        $session = session();

        $id = $this->request->getPost('Id');
        $data = [
            'lastname' => $this->request->getPost('lastname'),
            'firstname' => $this->request->getPost('firstname'),
            'middlename' => $this->request->getPost('middlename'),
            'nickname' => $this->request->getPost('nickname'),
            'DateBirth' => $this->request->getPost('DateBirth'),
            'gender' => $this->request->getPost('gender'),
            'marital_stat' => $this->request->getPost('marital_stat'),
            'ContNum' => $this->request->getPost('ContNum'),
            'ComAdd' => $this->request->getPost('ComAdd'),
            'EmergencyAdd' => $this->request->getPost('EmergencyAdd'),
            'EmergencyContNum' => $this->request->getPost('EmergencyContNum'),
            'RegDate' => $this->request->getPost('RegDate'),
        ];

        $picture = $this->request->getFile('ProfPic');
        $imagePath = $_SERVER['DOCUMENT_ROOT'];

        if ($picture && $picture->isValid() && !$picture->hasMoved()) {
            // Handle file upload
            $newFileName = $picture->getRandomName();
            $picture->move($imagePath . '/upload/seniors/', $newFileName);
            $data['ProfPic'] = $newFileName;
            $main->update($id, $data);

        } 
        
        elseif(empty($picture)){
            $data = [
                'lastname' => $this->request->getPost('lastname'),
                'firstname' => $this->request->getPost('firstname'),
                'middlename' => $this->request->getPost('middlename'),
                'nickname' => $this->request->getPost('nickname'),
                'DateBirth' => $this->request->getPost('DateBirth'),
                'gender' => $this->request->getPost('gender'),
                'marital_stat' => $this->request->getPost('marital_stat'),
                'ContNum' => $this->request->getPost('ContNum'),
                'ComAdd' => $this->request->getPost('ComAdd'),
                'EmergencyAdd' => $this->request->getPost('EmergencyAdd'),
                'EmergencyContNum' => $this->request->getPost('EmergencyContNum'),
                'RegDate' => $this->request->getPost('RegDate'),
            ];
        $main->update($id, $data);
    
        }
        
        $main->update($id, $data);
        
        return redirect()->to('/test');
    }

    
    // public function updatess()
    // {
    //     $data =[
    //         'Name' => $this->request->getPost('Name'),
    //         'DateBirth' => $this->request->getPost('DateBirth'),
    //         'ContNum' => $this->request->getPost('ContNum'),
    //         'ComAdd' => $this->request->getPost('ComAdd'),
    //         'ProfPic' => $this->request->getPost('ProfPic'),
    //         'EmergencyAdd' => $this->request->getPost('EmergencyAdd'),
    //         'EmergencyContNum' => $this->request->getPost('EmergencyContNum'),
    //         'RegDate' => $this->request->getPost('RegDate'),
    //     ];
    //     $main = new MainModel();
    //     $main->set($data)->where($data)->update();
    //     return redirect()->to('/test');
    // }
    public function submit(){
        $main = new MainModel();
        $data['main'] = $main->findAll();
        return view ('/test', $data);
    }
    // public function editss($Id = null)
    // {
    //     $main = new MainModel();
    //     $data['main'] = $main->find($Id);
    //     return view('/test', $data);
    // }
    public function show(){
        $product = new ProductsModel();
        $data = [
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
            'countNotifs' => $this->userbooking->where('status', 'pending')->countAllResults()
        ];
        $data['product'] = $product->findAll();
        return view ('dashboard/manageproduct', $data);
    }
    public function saved(){
        $session = session();

        $Id = $this->request->getPost('Id');
        $data = [
         'ProdName' => $this->request->getPost('ProdName'),
            'Quantity' => $this->request->getPost('Quantity'),
            'ProdPrice' => $this->request->getPost('ProdPrice'),
            'ProdDescription' => $this->request->getPost('ProdDescription'),
            'ProdPic' => $this->request->getPost('ProdPic'),
        ];
        
        $picture = $this->request->getFile('ProdPic');
        $imagePath = $_SERVER['DOCUMENT_ROOT'];
        
        if ($picture && $picture->isValid() && !$picture->hasMoved()) {
            // Handle file upload
            $newFileName = $picture->getRandomName();
            $picture->move($imagePath . '/upload/product/', $newFileName);
            $data['ProdPic'] = $newFileName;
        } 
        
        $products = new ProductsModel();
        if (!empty($Id)) {
            $products->update($Id, $data);
        } else {
           
        $products->save($data);
        return redirect()->to('/show');
        }
    }

    public function ViewEditLeft($id)
    {
              $data = [
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
            'countNotifs' => $this->userbooking->where('status', 'pending')->countAllResults()
        ];
 
        $main = new MainModel();
       
        $data['left'] = $this->main->where('id', $id)->first($id);

        // var_dump($data);
        return view('dashboard/editleftelder', $data);
    }

    public function saveEditleft($id) {
        $data = [
            'departuredate' => $this->request->getVar('departuredate'),
            'reasonleft' => $this->request->getVar('reasonleft'),
        ];
        $this->main->update($id,$data);
        return redirect()->to('archives');
    }

    public function ViewEditDeceased($id)
    {
              $data = [
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
            'countNotifs' => $this->userbooking->where('status', 'pending')->countAllResults()
        ];
 
        $main = new MainModel();
       
        $data['deceased'] = $this->main->where('id', $id)->first($id);

        // var_dump($data);
        return view('dashboard/editdeceasedelder', $data);
    }

    public function saveEditdeceased($id) {
        $data = [
            'datedeath' => $this->request->getVar('datedeath'),
            'causedeath' => $this->request->getVar('causedeath'),
        ];
        $this->main->update($id,$data);
        return redirect()->to('archivesdeceased');
    }

    public function viewreportleft()
    {
        $data = [

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
                'countNotifs' => $this->userbooking->where('status', 'pending')->countAllResults()
        ];
        return view('dashboard/searchreportleft', $data);
    }


    public function viewSearchLeft()
    {
       $fromdate = $this->request->getVar('fromdate');
       $todate   =  $this->request->getVar('todate');
        $data = [   
            'Left' => $this->main                    
                     ->where('scstatus', 'Left')
                      ->where('departuredate >=', $fromdate)
                      ->where('departuredate <=', $todate)
                      ->findAll(),

            'fromdate' => $fromdate,
            'todate' => $todate,
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
            'countNotifs' => $this->userbooking->where('status', 'pending')->countAllResults()
        ];

        $cdate = new \DateTime();
       foreach($data['Left'] as &$person)
       {
           $birthDate = new \DateTime($person['DateBirth']);
           $LeftDate = new \DateTime($person['departuredate']);
           $age = $LeftDate->diff($birthDate)->y;
           $person['age'] = $age;
       }

        return view('dashboard/searchLeft', $data);
    }


 public function getReportsLeft($fromdate, $todate)
{
    set_time_limit(120);

    $namesig = $this->request->getVar('signatoryName');
    $namepos = $this->request->getVar('positionName');
    
    // Use local file path for the image
    $imagePath = $_SERVER['DOCUMENT_ROOT'] . '/LogoHapagAruga.png';
    if (file_exists($imagePath)) {
        $imageData = base64_encode(file_get_contents($imagePath));
        $imageSrc = 'data:image/jpeg;base64,' . $imageData;
    } else {
        die('Image not found.');
    }

    // Fetch data
    $data['main'] = $this->main->where('scstatus', 'Left')
                              ->where('departuredate >=', $fromdate)
                              ->where('departuredate <=', $todate)
                              ->findAll();

    // Count records
    $count = $this->main->where('scstatus', 'Left')
                        ->where('departuredate >=', $fromdate)
                        ->where('departuredate <=', $todate)
                        ->countAllResults();
    
    // Get the closest lower record
    $closestLowerRecord = $this->main->where('scstatus', 'Left')
                                     ->orderBy('RegDate', 'ASC')
                                     ->first(); // Getting the record with the closest lower date

    $closestLowerDate = $closestLowerRecord ? $closestLowerRecord['RegDate'] : 'N/A'; 

    $cdate = new \DateTime();
       foreach($data['main'] as &$person)
       {
           $birthDate = new \DateTime($person['DateBirth']);
           $LeftDate = new \DateTime($person['departuredate']);
           $age = $LeftDate->diff($birthDate)->y;
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
                <h3 style="font-size:15px;">LIST OF ELDERS (LEFT)</h3>
            </div>

            <div class="report-info">
                <p>Date: ' . date('F j, Y',strtotime($currentDate)) . '</p>
                <p>Reporting Period: '. date('F j, Y', strtotime($fromdate)) .' - '. date('F j, Y',strtotime($todate)) . '</p>
            </div>
            
            <table class="table">
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
                        <th>Departure Date</th>
                        <th>Reason</th>
                    </tr>
                </thead>
                <tbody>';

        foreach ($data['main'] as $reg) {
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
                <td>' . $reg['departuredate'] . '</td>
                <td>' . $reg['reasonleft'] . '</td>
            </tr>';
        }

        $html .= '</tbody></table>

        <p class="summary">Summary</p>
        <p>During the reporting period, a total of '. $count.' elderly individuals left the Elder Care Program of Hapag Aruga Foundation Incorporated.</p>
         <div style="display: flex; justify-content: flex-start; margin-top: 40px;">
            <div style="text-align: center; width: 200px;">
                <p style="margin: 5px 0 0 0; font-size: 14px;">'. $namesig .'</p>
                <div style="border-bottom: 1px solid black; width: 100%; margin: 5px 0;"></div>
                <p style="margin: 5px 0 0 0; font-size: 14px;">'. $namepos.'</p>
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
$dompdf->stream('Elderly_Left_Report.pdf', array('Attachment' => 0));

// Stop CodeIgniter from further processing (optional, but good practice)
exit();

}

    public function viewreportdeath()
    {
        $data = [
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
                'countNotifs' => $this->userbooking->where('status', 'pending')->countAllResults()
        ];
        return view('dashboard/searchreportdeath', $data);
    }

    public function viewSearchDeath()
    {

       $fromdate = $this->request->getVar('fromdate');
       $todate   =  $this->request->getVar('todate');
        $data = [   
            'Deceased' => $this->main
                      ->where('scstatus', 'Deceased')
                      ->where('datedeath >=', $fromdate)
                      ->where('datedeath <=', $todate)
                      ->findAll(),

            'fromdate' => $fromdate,
            'todate' => $todate,
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
            'countNotifs' => $this->userbooking->where('status', 'pending')->countAllResults()
        ];

        $cdate = new \DateTime();
        foreach($data['Deceased'] as &$person)
        {
            $birthDate = new \DateTime($person['DateBirth']);
            $deathDate = new \DateTime($person['datedeath']);
            $age = $deathDate->diff($birthDate)->y;
            $person['age'] = $age;
        }

        return view('dashboard/searchdeath', $data);
    }

    public function getReportsDeath($fromdate, $todate)
    {
        set_time_limit(120);

        $namesig = $this->request->getVar('signatoryName');
        $namepos = $this->request->getVar('positionName');
        
        // Use local file path for the image
        $imagePath = $_SERVER['DOCUMENT_ROOT'] . '/LogoHapagAruga.png';
        if (file_exists($imagePath)) {
            $imageData = base64_encode(file_get_contents($imagePath));
            $imageSrc = 'data:image/jpeg;base64,' . $imageData;
        } else {
            die('Image not found.');
        }
       
        $data['main']= $this->main->where('scstatus', 'Deceased')->where('datedeath >=', $fromdate)->where('datedeath <=', $todate)->findAll();
        $closestLowerRecord = $this->main
        ->where('scstatus', 'Deceased')
        ->orderBy('RegDate', 'ASC')
        ->first(); // Getting the record with the closest lower date

        $closestLowerDate = $closestLowerRecord ? $closestLowerRecord['RegDate'] : 'N/A'; 

        $count = $this->main
        ->where('scstatus', 'Deceased')
        ->where('datedeath >=', $fromdate)
        ->where('datedeath <=', $todate)
        ->countAllResults();

        $cdate = new \DateTime();
       foreach($data['main'] as &$person)
       {
           $birthDate = new \DateTime($person['DateBirth']);
           $deathDate = new \DateTime($person['datedeath']);
           $age = $deathDate->diff($birthDate)->y;
           $person['age'] = $age;
       }
        
        $dompdf = new Dompdf();
        $options = $dompdf->getOptions();
        $options->set('isRemoteEnabled', true); // Enable remote content
        $options->set('isHtml5ParserEnabled', true); // Enable HTML5 parsing
        $dompdf->setOptions($options);
        $currentDate = date('Y-m-d'); // Get the current date in 'YYYY-MM-DD' format
       
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
                <h3 style="font-size:15px;">LIST OF ELDERS (DECEASED)</h3>

            </div>

            <div class="report-info">
                <p>Date: ' . Date('F j, Y',strtotime($currentDate)) . '</p>
                <p>Reporting Period: '. date('F j, Y', strtotime($fromdate)) .' - '. date('F j, Y',strtotime($todate)) . '</p>
            </div>
            
            <table class="table">
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
                        <th>Date of Death</th>
                        <th>Cause</th>
                    </tr>
                </thead>
                <tbody>';

        foreach ($data['main'] as $reg) {
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
                <td>' . $reg['datedeath'] . '</td>
                <td>' . $reg['causedeath'] . '</td>
            </tr>';
        }

        $html .= '</tbody></table>

        <p class="summary">Summary</p>
        <p>During the reporting period, a total of '. $count.' elderly individuals passed away in the Elder Care Program of Hapag Aruga Foundation Incorporated.</p>
         <div style="display: flex; justify-content: flex-start; margin-top: 40px;">
            <div style="text-align: center; width: 200px;">
                <p style="margin: 5px 0 0 0; font-size: 14px;">'. $namesig .'</p>
                <div style="border-bottom: 1px solid black; width: 100%; margin: 5px 0;"></div>
                <p style="margin: 5px 0 0 0; font-size: 14px;">'. $namepos.'</p>
            </div>
        </div>
    </div>
        </body>
        </html>';

        
        // Load HTML content into Dompdf
        $dompdf->loadHtml($html);
        
        // Set paper size and orientation
        $dompdf->setPaper('A4', 'landscape');
        
        // Render PDF
        $dompdf->render();
        
        // Output the PDF as a string (inline display in the browser)
        $dompdf->stream('Elderly_Deceased_Report.pdf', array('Attachment' => 0));
        
        // Stop CodeIgniter from further processing
        exit();
        
    }

    public function getReportsMonatary($fromdate, $todate)
    {
        set_time_limit(120);

        $namesig = $this->request->getVar('signatoryName');
        $namepos = $this->request->getVar('positionName');
        
        // Use local file path for the image
        $imagePath = $_SERVER['DOCUMENT_ROOT'] . '/LogoHapagAruga.png';
        if (file_exists($imagePath)) {
            $imageData = base64_encode(file_get_contents($imagePath));
            $imageSrc = 'data:image/jpeg;base64,' . $imageData;
        } else {
            die('Image not found.');
        }
        
        $data['main'] = $this->uidm->where('DATE(donationdate) >=', $fromdate)
                                   ->where('DATE(donationdate) <=', $todate)
                                   ->where('status', 'Received')    
                                   ->findAll();

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
    
        $dompdf = new \Dompdf\Dompdf();
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
            font-size: 11px;
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
                <h3 style="font-size:15px;">CASH DONATIONS</h3>

            </div>

            <div class="report-info">
                <p>Date: ' . Date('F j, Y',strtotime($currentDate)) . '</p>
                <p>Reporting Period: '. date('F j, Y', strtotime($fromdate)) .' - '. date('F j, Y',strtotime($todate)) . '</p>
            </div>
            
          <table class="table">
                <thead>
                <tr>
                    <th>Date</th>
                    <th>Establishment</th>
                    <th>Last Name</th>
                    <th>First Name</th>
                    <th>Middle Name</th>
                    <th>Contact Number</th>
                    <th>Receipt Number</th>
                    <th>Cash Donation</th>
                    <th>Cash Check</th>
                    <th>Mumo sa Hapag</th>
                </tr>
                </thead>
                <tbody>';
                
        foreach ($data['main'] as $mntry) {
            $dateString = $mntry['donationdate'];
            $date = new \DateTime($dateString);
            $formattedDate = $date->format('F j, Y');
            $html .= '<tr>
                <td>' . $formattedDate . '</td>
                <td>' . $mntry['establishment'] . '</td>
                <td>' . $mntry['lastname'] . '</td>
                <td>' . $mntry['firstname'] . '</td>
                <td>' . $mntry['middlename'] . '</td>
                <td>' . $mntry['contactnum'] . '</td>
                <td>' . $mntry['referencenum'] . '</td>
                <td>' .number_format($mntry['cashDonation'], 2) . '</td>
                <td>' . number_format($mntry['cashCheck'], 2) . '</td>
                <td>' . $mntry['mumosahapag'] . '</td>
            </tr>';
        }

        $html .= '</tbody></table>
        <p>Total Cash Donation: '. number_format($totals['total_cash_donation'], 2).'</p>
        <p>Total Cash Check: '. number_format($totals['total_cash_check'], 2).'</p>
        <p>Total Mumo sa Hapag: '. number_format($totals['total_mumosahapag'], 2).'</p>

        <div style="display: flex; justify-content: flex-start; margin-top: 40px;">
            <div style="text-align: center; width: 200px;">
                <p style="margin: 5px 0 0 0; font-size: 14px;">'. $namesig .'</p>
                <div style="border-bottom: 1px solid black; width: 100%; margin: 5px 0;"></div>
                <p style="margin: 5px 0 0 0; font-size: 14px;">'. $namepos.'</p>
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
        $dompdf->stream('Monetary_Donation_Report.pdf', array('Attachment' => 0));
    
        // Stop CodeIgniter from further processing (optional, but good practice)
        exit();
    }
    
    public function admisionslip()
    {
        return view("admin/admisionslip");
    }

        public function admisionWithData($elderData)
        {
            $data = [

                'elder' =>  $this->admissionslip->select('tblscdetails.Id, adminsionsliptbl.slipId, adminsionsliptbl.scId, adminsionsliptbl.casenum, adminsionsliptbl.birthplace, adminsionsliptbl.nameCom
                                                        , adminsionsliptbl.addressCom , adminsionsliptbl.contactCom , adminsionsliptbl.RelationClient , adminsionsliptbl.nameRef
                                                        , adminsionsliptbl.addressRef , adminsionsliptbl.contactRef , adminsionsliptbl.Num1A , adminsionsliptbl.Num1D
                                                        , adminsionsliptbl.Num2A , adminsionsliptbl.Num2D , adminsionsliptbl.Num3A , adminsionsliptbl.Num3D , adminsionsliptbl.Num4A , adminsionsliptbl.Num4D
                                        , adminsionsliptbl.Num5A , adminsionsliptbl.Num5D , adminsionsliptbl.Num6A , adminsionsliptbl.Num6D , adminsionsliptbl.Num7A 
                                        , adminsionsliptbl.Num7D , adminsionsliptbl.Num8A , adminsionsliptbl.Num8D , adminsionsliptbl.Num9A , adminsionsliptbl.Num9D , adminsionsliptbl.Num10A , adminsionsliptbl.Num10D 
                                        , adminsionsliptbl.Num11A , adminsionsliptbl.Num11D , adminsionsliptbl.Num12A , adminsionsliptbl.Num12D , adminsionsliptbl.Num13A 
                                        , adminsionsliptbl.Num13D , adminsionsliptbl.Num14A , adminsionsliptbl.Num14D , adminsionsliptbl.Num15A , adminsionsliptbl.Num15D 
                                        , adminsionsliptbl.inventoriedby , adminsionsliptbl.turnoverto , adminsionsliptbl.receivedby , adminsionsliptbl.referringparty , adminsionsliptbl.socialworker, tblscdetails.lastname , tblscdetails.firstname 
                                        , tblscdetails.middlename , tblscdetails.nickname , tblscdetails.DateBirth , tblscdetails.gender , tblscdetails.marital_stat , tblscdetails.ContNum 
                                        , tblscdetails.ComAdd , tblscdetails.ProfPic , tblscdetails.EmergencyAdd , tblscdetails.EmergencyContNum , tblscdetails.RegDate , tblscdetails.scstatus , tblscdetails.departuredate 
                                        , tblscdetails.reasonleft , tblscdetails.datedeath , tblscdetails.causedeath , tblscdetails.InputedDate , tblscdetails.adminId')
                                        ->join('tblscdetails', 'tblscdetails.Id = adminsionsliptbl.scId')->where('adminsionsliptbl.scId', $elderData)->first(),


                // 'elder' =>    $this->main->where('Id', $elderData)->first(), 
            ];   
            
            if(isset($data['elder']))
            {
            return view("admin/admissionwithdata", $data);

            }
            else{

                
                $data['elder'] =   $this->main->where('Id', $elderData)->first();

                return view("admin/admissionwithdata", $data);
            }
            // return view("admin/admissionwithdata", $data);
        }

    public function addmissionWithDatapreviewtosave($elderData)
    {
        $casenum = $this->request->getVar('casenum');
        $birthplace = $this->request->getVar('birthplace');
        $nameCom = $this->request->getVar('nameCom');
        $addressCom = $this->request->getVar('addressCom');
        $contactCom = $this->request->getVar('contactCom');
        $RelatinClient = $this->request->getVar('RelatinClient');
        $nameRef = $this->request->getVar('nameRef');
        $addressRef = $this->request->getVar('addressRef');
        $contactRef = $this->request->getVar('contactRef');
        $num1Admision = $this->request->getVar('num1Admision');
        $num1Discharge = $this->request->getVar('num1Discharge');
        $num2Admision = $this->request->getVar('num2Admision');
        $num2Discharge = $this->request->getVar('num2Discharge');
        $num3Admision = $this->request->getVar('num3Admision');
        $num3Discharge = $this->request->getVar('num3Discharge');
        $num4Admision = $this->request->getVar('num4Admision');
        $num4Discharge = $this->request->getVar('num4Discharge');
        $num5Admision = $this->request->getVar('num5Admision');
        $num5Discharge = $this->request->getVar('num5Discharge');
        $num6Admision = $this->request->getVar('num6Admision');
        $num6Discharge = $this->request->getVar('num6Discharge');
        $num7Admision = $this->request->getVar('num7Admision');
        $num7Discharge = $this->request->getVar('num7Discharge');
        $num8Admision = $this->request->getVar('num8Admision');
        $num8Discharge = $this->request->getVar('num8Discharge');
        $num9Admision = $this->request->getVar('num9Admision');
        $num9Discharge = $this->request->getVar('num9Discharge');
        $num10Admision = $this->request->getVar('num10Admision');
        $num10Discharge = $this->request->getVar('num10Discharge');
        $num11Admision = $this->request->getVar('num11Admision');
        $num11Discharge = $this->request->getVar('num11Discharge');
        $num12Admision = $this->request->getVar('num12Admision');
        $num12Discharge = $this->request->getVar('num12Discharge');
        $num13Admision = $this->request->getVar('num13Admision');
        $num13Discharge = $this->request->getVar('num13Discharge');
        $num14Admision = $this->request->getVar('num14Admision');
        $num14Discharge = $this->request->getVar('num14Discharge');
        $num15Admision = $this->request->getVar('num15Admision');
        $num15Discharge = $this->request->getVar('num15Discharge');
        $inventoriedby = $this->request->getVar('inventoriedby');
        $turnoverto = $this->request->getVar('turnoverto');
        $receivedby = $this->request->getVar('receivedby');
        $referringparty = $this->request->getVar('referringparty');
        $socialworker = $this->request->getVar('socialworker');

        $data = [
            'casenum' => $casenum,
            'birthplace' => $birthplace,
            'nameCom' => $nameCom,
            'addressCom' => $addressCom,
            'nameRef' => $nameRef,
            'contactCom' => $contactCom,
            'RelatinClient' => $RelatinClient,
            'addressRef' => $addressRef,
            'contactRef' => $contactRef,
            'num1Admision' => $num1Admision,
            'num1Discharge' => $num1Discharge,
            'num2Admision' => $num2Admision,
            'num2Discharge' => $num2Discharge,
            'num3Admision' => $num3Admision,
            'num3Discharge' => $num3Discharge,
            'num4Admision' => $num4Admision,
            'num4Discharge' => $num4Discharge,
            'num5Admision' => $num5Admision,
            'num5Discharge' => $num5Discharge,
            'num6Admision' => $num6Admision,
            'num6Discharge' => $num6Discharge,
            'num7Admision' => $num7Admision,
            'num7Discharge' => $num7Discharge,
            'num8Admision' => $num8Admision,
            'num8Discharge' => $num8Discharge,
            'num9Admision' => $num8Admision,
            'num9Discharge' => $num9Discharge,
            'num10Admision' => $num10Admision,
            'num10Discharge' => $num10Discharge,
            'num11Admision' => $num11Admision,
            'num11Discharge' => $num11Discharge,
            'num12Admision' => $num12Admision,
            'num12Discharge' => $num12Discharge,
            'num13Admision' => $num13Admision,
            'num13Discharge' => $num13Discharge,
            'num14Admision' => $num14Admision,
            'num14Discharge' => $num14Discharge,
            'num15Admision' => $num14Admision,
            'num15Discharge' => $num5Discharge,
            'inventoriedby' => $inventoriedby,
            'turnoverto' => $turnoverto,
            'receivedby' => $receivedby,
            'referringparty' => $referringparty,
            'socialworker' => $socialworker,

            'elder' =>    $this->main->where('Id', $elderData)->first(), 
        ];   
        return view("admin/addmissionWithDatapreviewtosave", $data);

        

    }

    public function printSlip($elderData)
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
      

        $dompdf = new \Dompdf\Dompdf();
        $options = $dompdf->getOptions();
        $options->set('isRemoteEnabled', true); 
        $options->set('isHtml5ParserEnabled', true);
        $dompdf->setOptions($options);
        
        $casenum = $this->request->getVar('casenum');
        $birthplace = $this->request->getVar('birthplace');
        $nameCom = $this->request->getVar('nameCom');
        $addressCom = $this->request->getVar('addressCom');
        $contactCom = $this->request->getVar('contactCom');
        $RelatinClient = $this->request->getVar('RelatinClient');
        $nameRef = $this->request->getVar('nameRef');
        $addressRef = $this->request->getVar('addressRef');
        $contactRef = $this->request->getVar('contactRef');
        $num1Admision = $this->request->getVar('num1Admision');
        $num1Discharge = $this->request->getVar('num1Discharge');
        $num2Admision = $this->request->getVar('num2Admision');
        $num2Discharge = $this->request->getVar('num2Discharge');
        $num3Admision = $this->request->getVar('num3Admision');
        $num3Discharge = $this->request->getVar('num3Discharge');
        $num4Admision = $this->request->getVar('num4Admision');
        $num4Discharge = $this->request->getVar('num4Discharge');
        $num5Admision = $this->request->getVar('num5Admision');
        $num5Discharge = $this->request->getVar('num5Discharge');
        $num6Admision = $this->request->getVar('num6Admision');
        $num6Discharge = $this->request->getVar('num6Discharge');
        $num7Admision = $this->request->getVar('num7Admision');
        $num7Discharge = $this->request->getVar('num7Discharge');
        $num8Admision = $this->request->getVar('num8Admision');
        $num8Discharge = $this->request->getVar('num8Discharge');
        $num9Admision = $this->request->getVar('num9Admision');
        $num9Discharge = $this->request->getVar('num9Discharge');
        $num10Admision = $this->request->getVar('num10Admision');
        $num10Discharge = $this->request->getVar('num10Discharge');
        $num11Admision = $this->request->getVar('num11Admision');
        $num11Discharge = $this->request->getVar('num11Discharge');
        $num12Admision = $this->request->getVar('num12Admision');
        $num12Discharge = $this->request->getVar('num12Discharge');
        $num13Admision = $this->request->getVar('num13Admision');
        $num13Discharge = $this->request->getVar('num13Discharge');
        $num14Admision = $this->request->getVar('num14Admision');
        $num14Discharge = $this->request->getVar('num14Discharge');
        $num15Admision = $this->request->getVar('num15Admision');
        $num15Discharge = $this->request->getVar('num15Discharge');
        $inventoriedby = $this->request->getVar('inventoriedby');
        $turnoverto = $this->request->getVar('turnoverto');
        $receivedby = $this->request->getVar('receivedby');
        $referringparty = $this->request->getVar('referringparty');
        $socialworker = $this->request->getVar('socialworker');

        $elder = $this->main->where('Id', $elderData)->first();


        $data = [
            'casenum' => $casenum,
            'birthplace' => $birthplace,
            'nameCom' => $nameCom,
            'addressCom' => $addressCom,
            'nameRef' => $nameRef,
            'contactCom' => $contactCom,
            'RelatinClient' => $RelatinClient,
            'addressRef' => $addressRef,
            'contactRef' => $contactRef,
            'num1Admision' => $num1Admision,
            'num1Discharge' => $num1Discharge,
            'num2Admision' => $num2Admision,
            'num2Discharge' => $num2Discharge,
            'num3Admision' => $num3Admision,
            'num3Discharge' => $num3Discharge,
            'num4Admision' => $num4Admision,
            'num4Discharge' => $num4Discharge,
            'num5Admision' => $num5Admision,
            'num5Discharge' => $num5Discharge,
            'num6Admision' => $num6Admision,
            'num6Discharge' => $num6Discharge,
            'num7Admision' => $num7Admision,
            'num7Discharge' => $num7Discharge,
            'num8Admision' => $num8Admision,
            'num8Discharge' => $num8Discharge,
            'num9Admision' => $num8Admision,
            'num9Discharge' => $num9Discharge,
            'num10Admision' => $num10Admision,
            'num10Discharge' => $num10Discharge,
            'num11Admision' => $num11Admision,
            'num11Discharge' => $num11Discharge,
            'num12Admision' => $num12Admision,
            'num12Discharge' => $num12Discharge,
            'num13Admision' => $num13Admision,
            'num13Discharge' => $num13Discharge,
            'num14Admision' => $num14Admision,
            'num14Discharge' => $num14Discharge,
            'num15Admision' => $num15Admision,
            'num15Discharge' => $num15Discharge,
            'inventoriedby' => $inventoriedby,
            'turnoverto' => $turnoverto,
            'receivedby' => $receivedby,
            'referringparty' => $referringparty,
            'socialworker' => $socialworker,
            'elder' =>    $this->main->where('Id', $elderData)->first(), 
            'mydata' => date('F d, Y', strtotime($elder['InputedDate']))
        ];  
$html = view('admin/topdf/addmission_pdf', $data);



// Load HTML content into Dompdf
$dompdf->loadHtml($html);

// Set paper size and orientation (optional)
$dompdf->setPaper('Legal', 'portrait'); // Change to 'Legal' for long bond paper

// Render PDF (optional: save to file or stream to browser)
$dompdf->render();

// Output the PDF as a string (inline display in the browser)
$pdfFilePath = $_SERVER['DOCUMENT_ROOT'] . '/uploads/Admission_Slip.pdf';
file_put_contents($pdfFilePath, $dompdf->output());

return redirect()->to('previewAdminslip');


    }   

    public function previewAdminslip()
    {
        return view('admin/topdf/include/addmissionPreview');
    }

    public function savedata()
    {
        // Ensure the request is an AJAX request
        if ($this->request->isAJAX()) {
            // Retrieve JSON data from the request body
            $json = $this->request->getJSON(true); // 'true' returns as an associative array
    
            if ($json) {
                // Extract CSRF token from data
                $csrfName = csrf_token();
                $csrfHash = csrf_hash();
    
                // Remove CSRF token from data to prevent it from being saved
                if (isset($json[$csrfName])) {
                    unset($json[$csrfName]);
                }
    
                // Define validation rules
                $validation = \Config\Services::validation();
                $validation->setRules([
                    'casenum' => 'required',
                    'birthplace' => 'required',
                    'nameCom' => 'required',
                    'contactCom' => 'required',
                    'RelationClient' => 'required',
                    'addressCom' => 'required',
                    'nameRef' => 'required',
                    'addressRef' => 'required',
                    'contactRef' => 'required',
                ]);
    
                // If validation passes
                if ($validation->run($json)) {
                    // Check if the record with the given casenum exists
                    $existingRecord = $this->admissionslip->where('scId', $json['scId'])->first();
    
                    if ($existingRecord) {
                        // Update the existing record
                        if ($this->admissionslip->update($existingRecord['slipId'], $json)) {
                            // Return success message with new CSRF hash
                            return $this->response->setJSON([
                                'status' => 'success',
                                'message' => 'Data updated successfully.',
                                'csrfHash' => $csrfHash
                            ]);
                        } else {
                            // Return error message if update fails
                            return $this->response->setJSON([
                                'status' => 'error',
                                'message' => 'Failed to update data.',
                                'csrfHash' => $csrfHash
                            ]);
                        }
                    } else {
                        // Insert a new record
                        if ($this->admissionslip->insert($json)) {
                            // Return success message with new CSRF hash
                            return $this->response->setJSON([
                                'status' => 'success',
                                'message' => 'Data saved successfully.',
                                'csrfHash' => $csrfHash
                            ]);
                        } else {
                            // Return error message if insertion fails
                            return $this->response->setJSON([
                                'status' => 'error',
                                'message' => 'Failed to save data.',
                                'csrfHash' => $csrfHash
                            ]);
                        }
                    }
                } else {
                    // Return validation errors
                    return $this->response->setJSON([
                        'status' => 'error',
                        'message' => $validation->getErrors(),
                        'csrfHash' => $csrfHash
                    ]);
                }
            } else {
                // No data received
                return $this->response->setJSON([
                    'status' => 'error',
                    'message' => 'No data received.',
                    'csrfHash' => csrf_hash()
                ]);
            }
        } else {
            // Invalid request type
            return $this->response->setJSON([
                'status' => 'error',
                'message' => 'Invalid request type.',
                'csrfHash' => csrf_hash()
            ]);
        }
    }

    public function ageCount()
    {
        $data = [
            ['name' => 'Alice', 'birthdate' => '1990-06-15'],
            ['name' => 'Bob', 'birthdate' => '1985-12-22'],
            ['name' => 'Charlie', 'birthdate' => '1992-03-05'],
            ['name' => 'Diana', 'birthdate' => '1998-09-10'],
            ['name' => 'Eve', 'birthdate' => '2000-01-25'],
            ['name' => 'Frank', 'birthdate' => '1980-04-18'],
            ['name' => 'Grace', 'birthdate' => '1995-11-30'],
            ['name' => 'Hank', 'birthdate' => '1993-07-09'],
            ['name' => 'Ivy', 'birthdate' => '2001-05-14'],
            ['name' => 'Jack', 'birthdate' => '1988-10-03']
        ];

        // Calculate ages
        $currentDate = new \DateTime();
        foreach ($data as &$person) {
            $birthDate = new \DateTime($person['birthdate']);
            $age = $currentDate->diff($birthDate)->y;
            $person['age'] = $age;
        }

        // Return data (can be modified to return as JSON or view)
        echo "<pre>";
        print_r($data);
        echo "</pre>";
    }

    }
