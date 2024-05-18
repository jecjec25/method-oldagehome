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
        </head>
        <body >
            <div style="text-align: center;position:relative;">
                <img src="' . $imageSrc . '" alt="Logo" style="position:absolute;left:0;top:0;height:120px">
                <h5 style="margin: 0;">Republic of the Philippines</h5>
                <h5 style="margin: 0;">Province of Oriental Mindoro</h5>
                <h5 style="margin: 0;">Barangay Managpi, Calapan City</h5>
                <h5 style="margin: 0;">Company Registration Number: <span style="color:red;">CN2011421030</span></h5>
                <h5 style="margin: 0;">Company TIN Number: <span style="color:red;">008-893-471</span></h5>
                <h5 style="margin: 0;">ARUGA-KAPATID FOUNDATION INCORPORATED</h5>
             </div>

            <h3  style="text-align: center;">Aruga Kapatid Foundation Incorporated</h3>
            <h4  style="text-align: center;">Elder Care Program Participant Report</h4>

            <p>Date: ' . $currentDate . '</p>
            <p>Reporting Period: This is the reporting date less than '. $currentDate . '</p>
            
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
            </tr>';
        }
        
        // Close the HTML table and body
        $html .= '</tbody></table>
        
        <p style="font-weight:600;">Summary</p>
        <p>During the reporting period, a total of '. $count.' elderly individuals left the Elder Care Program of Aruga Kapatid Foundation Incorporated.</p>

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
        </head>
        <body >
            <div style="text-align: center;position:relative;">
                <img src="' . $imageSrc . '" alt="Logo" style="position:absolute;left:0;top:0;height:120px">
                <h5 style="margin: 0;">Republic of the Philippines</h5>
                <h5 style="margin: 0;">Province of Oriental Mindoro</h5>
                <h5 style="margin: 0;">Barangay Managpi, Calapan City</h5>
                <h5 style="margin: 0;">Company Registration Number: <span style="color:red;">CN2011421030</span></h5>
                <h5 style="margin: 0;">Company TIN Number: <span style="color:red;">008-893-471</span></h5>
                <h5 style="margin: 0;">ARUGA-KAPATID FOUNDATION INCORPORATED</h5>
             </div>

            <h3  style="text-align: center;">Aruga Kapatid Foundation Incorporated</h3>
            <h4  style="text-align: center;">Elder Care Program Participant Report</h4>

            <p>Date: ' . $currentDate . '</p>
            <p>Reporting Period: This is the reporting date less than '. $currentDate . '</p>
            
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
            </tr>';
        }
        
        // Close the HTML table and body
        $html .= '</tbody></table>
        
        <p style="font-weight:600;">Summary</p>
        <p>During the reporting period, a total of '. $count.' elderly individuals passed away in the Elder Care Program of Aruga Kapatid Foundation Incorporated.</p>

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
        $dompdf->stream('Elderly_Deceased_Report.pdf', array('Attachment' => true));
        
        // Stop CodeIgniter from further processing (optional, but good practice)
        exit();
        
    }

    public function save()
    {
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
            'ProfPic' => $this->request->getPost('ProfPic'),
            'EmergencyAdd' => $this->request->getPost('EmergencyAdd'),
            'EmergencyContNum' => $this->request->getPost('EmergencyContNum'),
            'RegDate' => $this->request->getPost('RegDate'),
            'scstatus' => 'Unarchive',
            'adminId' => $this->request->getPost('adminId')

        ];
        
        $main = new MainModel();

        $main->save($data);
        return redirect()->to('/test');
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
                'ProfPic' => $this->request->getPost('ProfPic'),
                'EmergencyAdd' => $this->request->getPost('EmergencyAdd'),
                'EmergencyContNum' => $this->request->getPost('EmergencyContNum'),
                'RegDate' => $this->request->getPost('RegDate'),
            ];

            $main->update($id, $data);

            return redirect()->to('/test')->with('success', 'Senior Citizen details updated successfully');
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
        $Id = $this->request->getPost('Id');
        $data = [
            'ProdName' => $this->request->getPost('ProdName'),
            'Quantity' => $this->request->getPost('Quantity'),
            'ProdPrice' => $this->request->getPost('ProdPrice'),
            'ProdDescription' => $this->request->getPost('ProdDescription'),
            'ProdPic' => $this->request->getPost('ProdPic'),
        ];
        
        $product= new ProductsModel();

        if (!empty($Id)){
            $product->update($Id, $data);
        }
        else 
        {
            $product->save($data);
        }
        return redirect()->to('/show');
    }

    
}