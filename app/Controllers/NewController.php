<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\MainModel;
use App\Models\ProductsModel;
use App\Models\UserModel;
use App\Controllers\ViewController;
use App\Models\UserbookingModel;
use CodeIgniter\RESTful\ResourceController;
use Dompdf\Dompdf;  
class NewController extends BaseController
{
    private $main;
    private $userbooking;

    public function __construct()
    {
        $this->userbooking = new UserbookingModel();
        $this->main = new MainModel();
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
                }
                .summary {
                    font-weight: 600;
                    margin-top: 20px;
                }
                .footer {
                    margin-top: 40px;
                    position: relative;
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
                        <th>Date of Death</th>
                        <th>Cause of Death</th>
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
        <p>During the reporting period, a total of '. $count.' elderly individuals passed away in the Elder Care Program of Aruga Kapatid Foundation Incorporated.</p>

        <div class="footer">
            <div class="signature-group">
                <div class="signature-section">
                    <p class="generated-by">
                        <strong>Report Generated By:</strong>
                        <div class="signature-line"></div>
                        <br>HENRY A. DACANAY III
                        <strong><br>ADMIN STAFF<strong>
                    </p>
                </div>
                <br>
                <div class="signature-section">
                    <p class="approved-by">
                        <strong>Approved By:</strong>
                        <div class="signature-line"></div>
                        <br>LITO C. VERGARA
                        <strong><br>ADMINISTRATOR<strong>
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
            $data['main'] = $this->main->like('firstname', $search)->where('scstatus','Unarchive')->findAll();
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
        if(empty($this->request->getVar('status')))
        {
            echo 'lagyan mo ng laman uy';
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

    
}