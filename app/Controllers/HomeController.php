<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\MainModel;
use App\Models\OrganizerModel;
use App\Models\UserbookingModel;


class HomeController extends BaseController
{
    private $acceptbooking;
    private $userbooking;
    private $organizer;
    public function __construct()
    {
        $this->organizer = new OrganizerModel();
        $this->userbooking = new UserbookingModel();
    }
    public function index(){
        $main = new MainModel();
        $data['main'] = $main->orderBy('Id', 'DESC')->findAll();
        return view('dashboard/managescdetails', $data);
    }
    public function create(){
        return view('dashboard/adddetails');
    }
    public function store() {
        $main = new MainModel();
        $data = [
            'Name' => $this->request->getVar('Name'),
            'DateBirth' => $this->request->getVar('DateBirth'),
            'ContNum' => $this->request->getVar('ContNum'),
            'ComAdd' => $this->request->getVar('ComAdd'),
            'ProfPic' => $this->request->getVar('ProfPic'),
            'EmergencyAdd' => $this->request->getVar('EmergencyAdd'),
            'EmergencyContNum' => $this->request->getVar('EmergencyContNum'),
            'RegDate'  => $this->request->getVar('RegDate'),
        ];
        $main->insert($data);
        return $this->response->redirect(site_url('/test'));
    }
    public function singleUser($Id = null){
        $main = new MainModel();
        $data['tblscdetails'] = $main->where('Id', $Id)->first();
        return view('dashboard/editscdetails', $data);
    }
    public function update(){
        $main = new MainModel();
        $Id = $this->request->getVar('Id');
        $data = [
            'Name' => $this->request->getVar('Name'),
            'DateBirth' => $this->request->getVar('DateBirth'),
            'ContNum' => $this->request->getVar('ContNum'),
            'ComAdd' => $this->request->getVar('ComAdd'),
            'ProfPic' => $this->request->getVar('ProfPic'),
            'EmergencyAdd' => $this->request->getVar('EmergencyAdd'),
            'EmergencyContNum' => $this->request->getVar('EmergencyContNum'),
            'RegDate'  => $this->request->getVar('RegDate'),
        ];
        $main->update($Id, $data);
        return $this->response->redirect('/list');
    }
 
    // delete name
    public function delete($Id = null){
        $main = new MainModel();
        $data['tblscdetails'] = $main->where('Id', $Id)->delete($Id);
        return $this->response->redirect(site_url('/test'));
    }    

     public function viewOrg()
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

        return view('dashboard/insertOrganization', $data);
     }

    public function organizer()
    {
        $organizer = new OrganizerModel();

       $data = [ 'org' => $organizer->findAll(),
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

       return view('dashboard/organizer', $data);
    }

    public function updateOrganization($id)
    {
        // Initialize the model
        $organizer = new OrganizerModel();
    
        // Get the input data
        $name = $this->request->getPost('name');
        $position = $this->request->getPost('position');  // Fixed typo here: 'postion' -> 'position'
    
        // Get the uploaded file
        $file = $this->request->getFile('img');
        
        if (!$file || !$file->isValid()) {
            // If no file was uploaded or the upload is invalid, you can keep the old image or handle this scenario
            $filePath = $this->request->getPost('old_img'); // assuming you pass the previous image path as "old_img"
        } else {
            // Move the uploaded file to a writable location
            $fileName = $file->getRandomName(); // Generate a unique name
            $filePath = $_SERVER['DOCUMENT_ROOT'] . '/images/' . $fileName; // Use CI's constant for the writable path
            $file->move($_SERVER['DOCUMENT_ROOT'] . '/images/', $fileName);  // Move the file to the uploads directory
        }
    
        // Prepare the data to update the database
        $data = [
            'img' => $fileName,  // Store the relative file path
            'name' => $name,
            'position' => $position  // Fixed 'postion' to 'position'
        ];
    
        // Update the organizer entry
        $organizer->where('id', $id)->set($data)->update();

        return redirect()->to('updatemember');
    }
    
    public function viewedit($id)
    {
        $organizer = new OrganizerModel();
       $data = ['organizer' => $organizer->where('id', $id)->first(),
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
       'countNotifs' => $this->userbooking->where('status', 'pending')->countAllResults()];

        return view('dashboard/editOrganization', $data);
    }

    public function insertOrganization()
    {
        $organizer = new OrganizerModel();

        $name = $this->request->getPost('name');
        $position = $this->request->getPost('position');
        
        $file = $this->request->getFile('img');
        if(!$file || !$file->isValid())
        {
            return 'the image is not valid';
        }

        $fileName = $file->getRandomName();
        $filePath =  $_SERVER['DOCUMENT_ROOT'] . '/images/' . $fileName;
        $file->move($_SERVER['DOCUMENT_ROOT'] . '/images/', $fileName);

        $data = ['name' => $name,
                'position' => $position,
                'img' => $fileName
                ];

        $organizer->save($data);

        return redirect()->to('updatemember');
    }

    public function deleteOrganizer($id)
    {
        $organizer = new OrganizerModel();

        $organizer->delete($id);
        return redirect()->to('updatemember');
    }
    
}