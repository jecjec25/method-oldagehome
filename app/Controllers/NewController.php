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
        $data['main'] = $this->main->where('scstatus', 'Unarchive')->findAll();
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
        
        // Use local file path for the image
        $imagePath = $_SERVER['DOCUMENT_ROOT'] . '/picture.jpg';
        if (file_exists($imagePath)) {
            $imageData = base64_encode(file_get_contents($imagePath));
            $imageSrc = 'data:image/jpeg;base64,' . $imageData;
        } else {
            die('Image not found.');
        }
       
        $data['main']= $this->main->where('scstatus', 'Left')->findAll();
        $closestLowerRecord = $this->main
        ->where('scstatus', 'Left')
        ->orderBy('RegDate', 'ASC')
        ->first(); // Getting the record with the closest lower date

        $closestLowerDate = $closestLowerRecord ? $closestLowerRecord['RegDate'] : 'N/A'; 

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
        .table {
            width: 100%;
            border-collapse: collapse;
        }
        .table th, .table td {
            border: 1px solid black;
            padding: 8px;
            text-align: left;
            font-size: 10px;
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
            .table td {
                max-width: 150px; /* Adjust as needed */
                overflow: hidden;
                text-overflow: ellipsis;
             
            }
        
            .table th, .table td {
                         font-size: 15px; /* Reduce font size for better fit */
            }
        
        </style>
        </head>
        <body>
            <div class="header">
                <img src="' . $imageSrc . '" alt="Logo">
                <h5>Republic of the Philippines</h5>
                <h5>Province of Oriental Mindoro</h5>
                <h5>Barangay Managpi, Calapan City</h5>
                <h5>Company Registration Number: <span style="color:red;">CN2011421030</span></h5>
                <h5>Company TIN Number: <span style="color:red;">008-893-471</span></h5>
                <h5>ARUGA-KAPATID FOUNDATION INCORPORATED</h5>
            </div>
                <br>
            <div class="title">
                <h3>Aruga Kapatid Foundation Incorporated</h3>
                <h4>Elder Care Program Participant Report</h4>
            </div>

            <div class="report-info">
                <p>Date: ' . $currentDate . '</p>
                <p>Reporting Period: '. $closestLowerDate .' - '. $currentDate . '</p>
            </div>
            
            <table class="table">
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
        <p>During the reporting period, a total of '. $count.' elderly individuals left the Elder Care Program of Aruga Kapatid Foundation Incorporated.</p>

        <div class="footer">
            <div class="signature-group">
                <div class="signature-section">
                    <p class="generated-by">
                        <strong>Report Generated By:</strong>
                        <div class="signature-line"></div>
                        <br>HENRY A. DACANAY III
                        <strong><br>ADMIN STAFF</strong>
                    </p>
                </div>
                <br>
                <div class="signature-section">
                    <p class="approved-by">
                        <strong>Approved By:</strong>
                        <div class="signature-line"></div>
                        <br>LITO C. VERGARA
                        <strong><br>ADMINISTRATOR</strong>
                    </p>
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
        $dompdf->stream('Elderly_Left_Report.pdf', array('Attachment' => true));

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
        
        // Use local file path for the image
        $imagePath = $_SERVER['DOCUMENT_ROOT'] . '/picture.jpg';
        if (file_exists($imagePath)) {
            $imageData = base64_encode(file_get_contents($imagePath));
            $imageSrc = 'data:image/jpeg;base64,' . $imageData;
        } else {
            die('Image not found.');
        }
       
        $data['main']= $this->main->where('scstatus', 'Deceased')->findAll();

        $closestLowerRecord = $this->main
        ->where('scstatus', 'Deceased')
        ->orderBy('RegDate', 'ASC')
        ->first(); // Getting the record with the closest lower date

        $closestLowerDate = $closestLowerRecord ? $closestLowerRecord['RegDate'] : 'N/A'; 

        $count = $this->main->where('scstatus', 'Deceased')
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
        .table {
            width: 100%;
            border-collapse: collapse;
        }
        .table th, .table td {
            border: 1px solid black;
            padding: 8px;
            text-align: left;
            font-size: 10px;
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
            .table td {
                max-width: 150px; /* Adjust as needed */
                overflow: hidden;
                text-overflow: ellipsis;
             
            }
        
            .table th, .table td {
                         font-size: 15px; /* Reduce font size for better fit */
            }
        
        </style>
        </head>
        <body>
            <div class="header">
                <img src="' . $imageSrc . '" alt="Logo">
                <h5>Republic of the Philippines</h5>
                <h5>Province of Oriental Mindoro</h5>
                <h5>Barangay Managpi, Calapan City</h5>
                <h5>Company Registration Number: <span style="color:red;">CN2011421030</span></h5>
                <h5>Company TIN Number: <span style="color:red;">008-893-471</span></h5>
                <h5>ARUGA-KAPATID FOUNDATION INCORPORATED</h5>
            </div>
                <br>
            <div class="title">
                <h3>Aruga Kapatid Foundation Incorporated</h3>
                <h4>Elder Care Program Participant Report</h4>
            </div>

            <div class="report-info">
                <p>Date: ' . $currentDate . '</p>
                <p>Reporting Period: '. $closestLowerDate .' - '. $currentDate . '</p>
            </div>
            
            <table class="table">
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
        <p>During the reporting period, a total of '. $count.' elderly individuals left the Elder Care Program of Aruga Kapatid Foundation Incorporated.</p>

        <div class="footer">
            <div class="signature-group">
                <div class="signature-section">
                    <p class="generated-by">
                        <strong>Report Generated By:</strong>
                        <div class="signature-line"></div>
                        <br>HENRY A. DACANAY III
                        <strong><br>ADMIN STAFF</strong>
                    </p>
                </div>
                <br>
                <div class="signature-section">
                    <p class="approved-by">
                        <strong>Approved By:</strong>
                        <div class="signature-line"></div>
                        <br>LITO C. VERGARA
                        <strong><br>ADMINISTRATOR</strong>
                    </p>
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
        $dompdf->stream('Elderly_Deceased_Report.pdf', array('Attachment' => true));

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


        return view('dashboard/searchLeft', $data);
    }


 public function getReportsLeft($fromdate, $todate)
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
    .table {
        width: 100%;
        border-collapse: collapse;
    }
    .table th, .table td {
        border: 1px solid black;
        padding: 8px;
        text-align: left;
        font-size: 10px;
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
    </style>
</head>
<body>
    <div class="header">
        <img src="' . $imageSrc . '" alt="Logo">
        <h5>Republic of the Philippines</h5>
        <h5>Province of Oriental Mindoro</h5>
        <h5>Barangay Managpi, Calapan City</h5>
        <h5>Company Registration Number: <span style="color:red;">CN2011421030</span></h5>
        <h5>Company TIN Number: <span style="color:red;">008-893-471</span></h5>
        <h5>ARUGA-KAPATID FOUNDATION INCORPORATED</h5>
    </div>
        <br>
    <div class="title">
        <h3>Aruga Kapatid Foundation Incorporated</h3>
        <h4>Elder Care Program Participant Report</h4>
    </div>

    <div class="report-info">
        <p>Date: ' . $currentDate . '</p>
        <p>Reporting Period: ' . $fromdate . ' - ' . $todate . '</p>
    </div>
    
    <div class="table-container">
        <table class="table">
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
                    <td class="date">' . $reg['DateBirth'] . '</td> 
                    <td>' . $reg['gender'] . '</td>
                    <td>' . $reg['marital_stat'] . '</td>
                    <td>' . $reg['ContNum'] . '</td>
                    <td>' . $reg['EmergencyAdd'] . '</td>
                    <td>' . $reg['RegDate'] . '</td>
                    <td class="date">' . $reg['departuredate'] . '</td> 
                    <td>' . $reg['reasonleft'] . '</td>
                </tr>';
            }
            
$html .= '</tbody></table>
    </div>

    <p class="summary">Summary</p>
    <p>During the reporting period, a total of ' . $count . ' elderly individuals left the Elder Care Program of Aruga Kapatid Foundation Incorporated.</p>

    <div class="footer">
        <div class="signature-group">
            <div class="signature-section">
                <p class="generated-by">
                    <strong>Report Generated By:</strong>
                    <div class="signature-line"></div>
                    <br>HENRY A. DACANAY III
                    <strong><br>ADMIN STAFF</strong>
                </p>
            </div>
            <br>
            <div class="signature-section">
                <p class="approved-by">
                    <strong>Approved By:</strong>
                    <div class="signature-line"></div>
                    <br>LITO C. VERGARA
                    <strong><br>ADMINISTRATOR</strong>
                </p>
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
$dompdf->stream('Elderly_Left_Report.pdf', array('Attachment' => true));

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


        return view('dashboard/searchdeath', $data);
    }

    public function getReportsDeath($fromdate, $todate)
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
                .table {
                    width: 100%;
                    border-collapse: collapse;
                }
                .table th, .table td {
                    border: 1px solid black;
                    padding: 8px;
                    text-align: left;
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
            </style>
        </head>
        <body>
            <div class="header">
                <img src="' . $imageSrc . '" alt="Logo">
                <h5>Republic of the Philippines</h5>
                <h5>Province of Oriental Mindoro</h5>
                <h5>Barangay Managpi, Calapan City</h5>
                <h5>Company Registration Number: <span style="color:red;">CN2011421030</span></h5>
                <h5>Company TIN Number: <span style="color:red;">008-893-471</span></h5>
                <h5>ARUGA-KAPATID FOUNDATION INCORPORATED</h5>
            </div>
                <br>
            <div class="title">
                <h3>Aruga Kapatid Foundation Incorporated</h3>
                <h4>Elder Care Program Participant Report</h4>
            </div>

            <div class="report-info">
                <p>Date: ' . $currentDate . '</p>
                <p>Reporting Period: '. $fromdate .' - '. $todate . '</p>
            </div>
            
            <table class="table">
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
                        <th>Date Of Death</th>
                        <th>Cause Of Death</th>
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
        <p>During the reporting period, a total of '.$count.' elderly individuals passed away in the Elder Care Program of Aruga Kapatid Foundation Incorporated.</p>

        <div class="footer">
            <div class="signature-group">
                <div class="signature-section">
                    <p class="generated-by">
                        <strong>Report Generated By:</strong>
                        <div class="signature-line"></div>
                        <br>HENRY A. DACANAY III
                        <strong><br>ADMIN STAFF</strong>
                    </p>
                </div>
                <br>
                <div class="signature-section">
                    <p class="approved-by">
                        <strong>Approved By:</strong>
                        <div class="signature-line"></div>
                        <br>LITO C. VERGARA
                        <strong><br>ADMINISTRATOR</strong>
                    </p>
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
        $dompdf->stream('Elderly_Deceased_Report.pdf', array('Attachment' => true));

        // Stop CodeIgniter from further processing (optional, but good practice)
        exit();
    }



    public function  getReportsMonatary($fromdate, $todate)
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
        
        $data['main'] = $this->uidm->where('DATE(donationdate) >=', $fromdate)
                                   ->where('DATE(donationdate) <=', $todate)
                                   ->findAll();

        $totals = $this->uidm
        ->select('SUM(cashDonation) as total_cash_donation, SUM(cashCheck) as total_cash_check, SUM(mumosahapag) as total_mumosahapag')
        ->where('DATE(donationdate) >=', $fromdate)
        ->where('DATE(donationdate) <=', $todate)
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
                .table {
                    width: 100%;
                    border-collapse: collapse;
                }
                .table th, .table td {
                    border: 1px solid black;
                    padding: 8px;
                    text-align: left;
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
            </style>
        </head>
        <body>
            <div class="header">
                <img src="' . $imageSrc . '" alt="Logo">
                <h5>Republic of the Philippines</h5>
                <h5>Province of Oriental Mindoro</h5>
                <h5>Barangay Managpi, Calapan City</h5>
                <h5>Company Registration Number: <span style="color:red;">CN2011421030</span></h5>
                <h5>Company TIN Number: <span style="color:red;">008-893-471</span></h5>
                <h5>ARUGA-KAPATID FOUNDATION INCORPORATED</h5>
            </div>
            <br>
            <div class="title">
                <h3>Aruga Kapatid Foundation Incorporated</h3>
                <h4>Monetary Donation Report</h4>
            </div>
    
            <div class="report-info">
                <p>Date: ' . $currentDate . '</p>
                <p>Reporting Period: ' . $fromdate . ' - ' . $todate . '</p>
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
            $formattedDate = $date->format('F j, Y g:i A');
            $html .= '<tr>
                <td>' . $formattedDate . '</td>
                <td>' . $mntry['establishment'] . '</td>
                <td>' . $mntry['lastname'] . '</td>
                <td>' . $mntry['firstname'] . '</td>
                <td>' . $mntry['middlename'] . '</td>
                <td>' . $mntry['contactnum'] . '</td>
                <td>' . $mntry['referencenum'] . '</td>
                <td>' . $mntry['cashDonation'] . '</td>
                <td>' . $mntry['cashCheck'] . '</td>
                <td>' . $mntry['mumosahapag'] . '</td>
            </tr>';
        }
    
        $html .= '</tbody></table>
        <p><strong>Total Cash Donation:</strong> '. number_format($totals['total_cash_donation'], 2).'</p>
        <p><strong>Total Cash Check:</strong> '. number_format($totals['total_cash_check'], 2).'</p>
        <p><strong>Total Mumo sa Hapag:</strong> '. number_format($totals['total_mumosahapag'], 2).'</p>
        <p class="summary">Summary</p>
        <p>During the reporting period, a total of ' . $count . ' monetary donations were received by Aruga Kapatid Foundation Incorporated.</p>
        <div class="footer">
            <div class="signature-group">
                <div class="signature-section">
                    <p class="generated-by">
                        <strong>Report Generated By:</strong>
                        <div class="signature-line"></div>
                        <br>HENRY A. DACANAY III
                        <strong><br>ADMIN STAFF</strong>
                    </p>
                </div>
                <br>
                <div class="signature-section">
                    <p class="approved-by">
                        <strong>Approved By:</strong>
                        <div class="signature-line"></div>
                        <br>LITO C. VERGARA
                        <strong><br>ADMINISTRATOR</strong>
                    </p>
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
        $dompdf->stream('Monetary_Donation_Report.pdf', array('Attachment' => true));
    
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
            'elder' =>    $this->main->where('Id', $elderData)->first(), 
        ];   
        

        if($data['elder'] === NULL)
        {
            return view("admin/admisionslip");
        }
        else{
        return view("admin/admissionwithdata", $data);
        }
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
            'receivedby' => $receivedby,
            'socialworker' => $socialworker,

            'elder' =>    $this->main->where('Id', $elderData)->first(), 
        ];   
        return view("admin/addmissionWithDatapreviewtosave", $data);

        

    }

    public function printSlip($elderData)
    {
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
        ];  

       $elder = $data['elder'];
$mydata = date('F d, Y', strtotime($elder['InputedDate']));
        $html = '<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Preview Deceased</title>
    <link rel="icon" type="image/png" href="/picture.png">
    <style>
       body {
        font-family: Arial, sans-serif;
        font-size: 12px; /* Reduce overall font size */
        margin: 0;
        padding: 0;
        background-color: #EDEEF1;
        display: flex;
        justify-content: center;
        align-items: center;
        height: 100vh;
    }

    .button-download, .button-back {
        position: absolute;
        top: 10px; /* Reduce the top margin */
    }

    .button-download {
        right: 10px; /* Reduce right margin */
    }

    .button-back {
        left: 10px; /* Reduce left margin */
    }

    .button-download a, .button-back a {
        padding: 8px 15px; /* Reduce padding */
        font-size: 12px; /* Reduce button font size */
        background-color: #007BFF;
        color: white;
        text-decoration: none;
        border-radius: 5px;
        cursor: pointer;
        transition: background-color 0.3s ease;
    }

    .button-download a:hover, .button-back a:hover {
        background-color: #0056b3;
    }

    .size {
        width: 210mm; /* Keep width */
        background-color: #fff;
        padding: 10px; /* Reduce padding */
        box-sizing: border-box;
    }

    .header {
        text-align: center;
        position: relative;
        margin-bottom: 10px; /* Reduce bottom margin */
    }

    .header img {
        position: absolute;
        left: 0;
        top: 0;
        height: 80px; /* Reduce image size */
    }

    table {
        width: 90%;
        border-collapse: collapse;
        table-layout: fixed;
        font-size: 12px; /* Reduce font size for table */
    }

    table, th, td {
        border: 1px solid black;
        word-wrap: break-word;
    }

    th, td {
        padding: 4px; /* Reduce padding */
        text-align: left;
    }

    .footer {
        margin-top: 20px; /* Reduce margin */
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

    .table-small-padding th, .table-small-padding td {
        padding: 2px; /* Minimize padding inside tables */
    }

    .page-break {
        page-break-before: always;
    }
       </style>
</head>
<body>
    <div class="button-download">
    </div>
    <div class="size">
        <div class="header">
            <h5 style="margin: 0;">Republic of the Philippines</h5>
            <h5 style="margin: 0;">Province of Oriental Mindoro</h5>
            <h5 style="margin: 0;">Barangay Managpi, Calapan City</h5>
            <h5 style="margin: 0;">Company Registration Number: CN2011421030</h5>
            <h5 style="margin: 0;">Company TIN Number: 008-893-471</h5>
            <h4 style="margin: 0; padding-top: 5px;">ARUGA-KAPATID FOUNDATION INCORPORATED</h4>
        </div>

        <h4 style="text-align: center;">ADMISION SLIP</h4>

           
        
       <table>
                <tr>
                    <th colspan="10" width="60%">Date of Admision: ' . $mydata .'</th>
                    <th colspan="8">Case No. '.$casenum .' </th>   
                </tr>
                <tr>
                    <th colspan="18" style="text-align: center;">Client</th>
                </tr>
                <tr>
                    <th colspan="10">Name: ' . $elder['firstname'] . $elder['middlename'] .  $elder['lastname'] .'</th>
                    <th colspan="3">Sex: ' . $elder['gender'] . '</th>
                    <th colspan="5">Civil Status: ' . $elder['marital_stat']. '</th>
                </tr>
                <tr>
                    <th colspan="18">Address: ' . $elder['ComAdd']. '</th>
                </tr>
                <tr>
                    <th colspan="3">Birth Date </th>
                  <th colspan="7">' . date('F d, Y', strtotime($elder['DateBirth'])) . '</th>

                    <th colspan="8">Birth Place '.$birthplace .' </th>
                </tr>
                <tr>
                    <th colspan="18" style="text-align: center;">COMPANION UPON ADMISION</th>
                </tr>
                <tr>
                    <th colspan="8">Name: ' .$nameCom. '</th>
                    <th colspan="10">Contact No. ' . $contactCom. '</th>
                </tr>
                <tr>
                    <th colspan="8">Address:  ' . $addressCom. '</th>
                    <th colspan="10">Relation to the Client ' .$RelatinClient. '</th>
                </tr>
                <tr>
                    <th colspan="18" style="text-align: center;">REFFERING PARTY</th>
                </tr>
                <tr>
                    <th colspan="18">Name: ' . $nameRef. '  </th>
                </tr>
                <tr>
                    <th colspan="18">Address: ' . $addressRef. '</th>
                </tr>
                <tr>
                    <th colspan="18">Contact no. ' . $contactRef. '</th>
                </tr>

          
        </table>
        <h3 style="text-align: center;">BELONGINGS</h1>
        <table >
                <tr>
                    <th colspan="2">No.</th>
                    <th colspan="9">Upon admision</th>
                    <th colspan="9">Upon Discharge</th>
                </tr>
                <tr>
                    <th colspan="2">1.</th>
                    <th colspan="9">' . $num1Admision. '</th>
                    <th colspan="9">' . $num1Discharge. '</th>
                </tr>
                <tr>
                    <th colspan="2">2.</th>
                    <th colspan="9">' . $num2Admision. '</th>
                    <th colspan="9">' . $num2Discharge. '</th>
                </tr>
                <tr>
                    <th colspan="2">3.</th>
                    <th colspan="9">' . $num3Admision. '</th>
                    <th colspan="9">' . $num3Discharge. '</th>
                </tr>
                <tr>
                    <th colspan="2">4.</th>
                    <th colspan="9">' . $num4Admision. '</th>
                    <th colspan="9">' . $num4Discharge. '</th>
                </tr>
                <tr> 
                    <th colspan="2">5.</th>
                   <th colspan="9">' . $num5Admision. '</th>
                    <th colspan="9">' . $num5Discharge. '</th>
                </tr>
                <tr>
                <th colspan="2">6.</th>
                   <th colspan="9">' . $num6Admision. '</th>
                    <th colspan="9">' . $num6Discharge. '</th>
                </tr>
                <tr>
                <th colspan="2">7.</th>
                   <th colspan="9">' . $num7Admision. '</th>
                    <th colspan="9">' . $num7Discharge. '</th>
                </tr>
                <tr>                
                <th colspan="2">8.</th>
                   <th colspan="9">' . $num8Admision. '</th>
                    <th colspan="9">' . $num8Discharge. '</th>
                </tr>
                <tr>
                <th colspan="2">9.</th>
                   <th colspan="9">' . $num9Admision. '</th>
                    <th colspan="9">' . $num9Discharge. '</th>
                </tr>
                <tr>
                <th colspan="2">10.</th>
                   <th colspan="9">' . $num10Admision. '</th>
                    <th colspan="9">' . $num10Discharge. '</th>
                </tr>
                <tr>
                <th colspan="2">11.</th>
                   <th colspan="9">' . $num11Admision. '</th>
                    <th colspan="9">' . $num11Discharge. '</th>
                </tr>
                <tr>
                <th colspan="2">12.</th>
                   <th colspan="9">' . $num12Admision. '</th>
                    <th colspan="9">' . $num12Discharge. '</th>
                </tr>
                <tr>
                <th colspan="2">13.</th>
                   <th colspan="9">' . $num13Admision. '</th>
                    <th colspan="9">' . $num13Discharge. '</th>
                </tr>
                <tr>
                <th colspan="2">14.</th>
                   <th colspan="9">' . $num14Admision. '</th>
                    <th colspan="9">' . $num14Discharge. '</th>
                </tr>
                <tr>
                <th colspan="2">15.</th>
                   <th colspan="9">' . $num15Admision. '</th>
                    <th colspan="9">' . $num15Discharge. '</th>
                </tr>
              <tr>

              <th colspan="11" style="text-align: center;">
    <h4 style="margin: 10px 0 0 0; text-align: center;">Inventoried by: _____________________________ '. $inventoriedby. ' </h4>
    <p style="margin: 0 0 0 70px; font-size: 12px; text-align: center;">Printed Name over Signature</p>
    <h4 style="margin: 20px 0 0 0; text-align: center;">Turn Over to: _____________________________ '. $turnoverto. '</h4>
    <p style="margin: 0 0 0 70px; font-size: 12px; text-align: center;">Printed Name over Signature</p>
</th>
<th colspan="9" style="text-align: center;">
    <h4 style="margin: 0; text-align: center;">Received By: _____________________________ '. $receivedby. '</h4>
    <p style="margin: 0 0 0 70px; font-size: 12px; text-align: center;">Printed Name over Signature</p>
</th>

</tr>
</form>

        </table>
        <div style="display: flex; justify-content: space-between; margin-top: 20px;">
    <div style="text-align: center;">
        <div style="border-bottom: 1px solid black; left:10px; width: 200px; margin: 0 auto;">'. $referringparty. '</div>
        <p style="margin: 5px 0 0 0; font-size: 14px;">Name & Signature of Referring Party</p>
    </div>
    <div style="text-align: center;">
    <br>
        <div style="border-bottom: 1px solid black; right:10px; width: 200px; margin: 0 auto;">'. $socialworker. '</div>
        <p style="margin: 1px 0 0 0; font-size: 14px;">Social Worker </p>
    </div>
</div>


            </div>
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
$dompdf->stream('Admission_Slip.pdf', array('Attachment' => true));

// Stop CodeIgniter from further processing (optional, but good practice)
exit();
    }   

    public function saveData()
    {
        // Ensure the request is an AJAX request
        if ($this->request->isAJAX()) {
            // Retrieve JSON data from the request body
            $json = $this->request->getJSON();

            if ($json) {
                $data = [
                    'casenum' => $json->field1 ?? null,
                    'birthplace' => $json->field2 ?? null,
                    'nameCom' => $json->field3 ?? null,
                    'addressCom' => $json->field4 ?? null,
                    'contactCom' => $json->field5 ?? null,
                    'RelationClient' => $json->field6 ?? null,
                    'nameRef' => $json->field7 ?? null,
                    'addressRef' => $json->field8 ?? null,
                    'contactRef' => $json->field9 ?? null,
                    'Num1A' => $json->field10 ?? null,
                    'Num1D' => $json->field11 ?? null,
                    'Num2A' => $json->field12 ?? null,
                    'Num2D' => $json->field13 ?? null,
                    'Num3A' => $json->field14 ?? null,
                    'Num3D' => $json->field15 ?? null,
                    'Num4A' => $json->field16 ?? null,
                    'Num4D' => $json->field17 ?? null,
                    'Num5A' => $json->field18 ?? null,
                    'Num5D' => $json->field19 ?? null,
                    'Num6A' => $json->field20 ?? null,
                    'Num6D' => $json->field21 ?? null,
                    'Num7A' => $json->field22 ?? null,
                    'Num7D' => $json->field23 ?? null,
                    'Num8A' => $json->field24 ?? null,
                    'Num8D' => $json->field25 ?? null,
                    'Num9A' => $json->field26 ?? null,
                    'Num9D' => $json->field27 ?? null,
                    'Num10A' => $json->field28 ?? null,
                    'Num10D' => $json->field29 ?? null,
                    'Num11A' => $json->field30 ?? null,
                    'Num11D' => $json->field31 ?? null,
                    'Num12A' => $json->field32 ?? null,
                    'Num12D' => $json->field33 ?? null,
                    'Num13A' => $json->field34 ?? null,
                    'Num13D' => $json->field35 ?? null,
                    'Num14A' => $json->field36 ?? null,
                    'Num14D' => $json->field37 ?? null,
                    'Num15A' => $json->field38 ?? null,
                    'Num15D' => $json->field39 ?? null,
                    'inventoriedby' => $json->field40 ?? null,
                    'turnoverto' => $json->field41 ?? null,
                    'receivedby' => $json->field42 ?? null,
                    'referringparty' => $json->field43 ?? null,
                    'socialworker' => $json->field44 ?? null,
                ];

                // Validate data
                $validation = \Config\Services::validation();

                $validation->setRules([
                    'field1' => 'required',
                    'field2' => 'required',
                    'field3' => 'required',
                    'field4' => 'required',
                    'field5' => 'required',
                    'field6' => 'required',
                    'field7' => 'required',
                    'field8' => 'required',
                    'field9' => 'required',
                    'field10' => 'required',
                ]);

                if ($validation->run($data)) {
                    // Save data to the database
                    if ($this->dataModel->insert($data)) {
                        // Optionally, generate a new CSRF hash
                        $newCsrfHash = csrf_hash();

                        return $this->response->setJSON([
                            'status'    => 'success',
                            'message'   => 'Data saved successfully.',
                            'csrfHash'  => $newCsrfHash, // Send new CSRF hash
                        ]);
                    } else {
                        return $this->response->setJSON([
                            'status'    => 'error',
                            'message'   => 'Failed to save data.',
                            'csrfHash'  => csrf_hash(),
                        ]);
                    }
                } else {
                    // Return validation errors
                    return $this->response->setJSON([
                        'status'    => 'error',
                        'message'   => $validation->getErrors(),
                        'csrfHash'  => csrf_hash(),
                    ]);
                }
            } else {
                return $this->response->setJSON([
                    'status'    => 'error',
                    'message'   => 'No data received.',
                    'csrfHash'  => csrf_hash(),
                ]);
            }
        } else {
            // Invalid request type
            return $this->response->setJSON([
                'status'    => 'error',
                'message'   => 'Invalid request type.',
                'csrfHash'  => csrf_hash(),
            ]);
        }
}
}

    
