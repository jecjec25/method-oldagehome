<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\EventsModel;
use App\Models\AcceptbookingModel;


class UserEvntPostController extends BaseController
{
    private $userevent;
    private $acceptbooking;

    public function __construct()
    {
        $this->userevent = new EventsModel();
        $this->acceptbooking = new AcceptbookingModel();
    }

    public function userEventpost()
    {
        $user = session()->get('userID');
        $data = [
           
            'notif' => $this->acceptbooking
                ->select('acceptbooking.id, acceptbooking.lastname, acceptbooking.firstname, 
                acceptbooking.middlename, acceptbooking.contactnum, acceptbooking.event, 
                acceptbooking.time, acceptbooking.prefferdate, acceptbooking.equipment, 
                acceptbooking.comments, acceptbooking.status, acceptbooking.usersignsId, 
                user.userID, user.LastName, user.FirstName')
                ->join('user', 'user.userID = acceptbooking.usersignsId')
                ->where('acceptbooking.status', 'Accepted')->orwhere('acceptbooking.status', 'Declined')->where('acceptbooking.usersignsId', $user )
                ->findAll(),
                
        'notifs' => $this->acceptbooking
            ->select('acceptbooking.id, acceptbooking.lastname, acceptbooking.firstname, 
            acceptbooking.middlename, acceptbooking.contactnum, acceptbooking.event, 
            acceptbooking.time, acceptbooking.prefferdate, acceptbooking.equipment, 
            acceptbooking.comments, acceptbooking.status, acceptbooking.usersignsId, 
            user.userID, user.LastName, user.FirstName')
            ->join('user', 'user.userID = acceptbooking.usersignsId')
            ->where('acceptbooking.status', 'Accepted')->where('acceptbooking.usersignsId', $user )
            ->first(),
        'getCount' => $this->acceptbooking->select('Count(*) as notif')->where('acceptbooking.usersignsId', $user)->first()
        ];

        return view ('admin/userEventPost', $data);
    }

    public function usersavepost()
    {
      
        $rules = [
            'Title'   => 'required|min_length[5]',
            'Description'   => 'required|min_length[5]',
            'Organizer'  => 'required|min_length[5]',
            'Atendees'  => 'required|min_length[5]',
            'Category'   => 'required',
        ];
        $imagePath = $_SERVER['DOCUMENT_ROOT'];
        $image = $this->request->getFile('Attachments');
        if($this->validate($rules))
        {

        if ($image && $image->isValid() && !$image->hasMoved()) 
        {
            $myImage = $image->getRandomName();

            $image->move($imagePath . 'upload/event', $myImage);
            $data = [
                'Attachments' => $image,
                'Attachments' => $myImage,
                'usersignsid' => $this->request->getVar('usersignsId'),
                'Title' => $this->request->getVar('Title'),
                'Description' => $this->request->getVar('Description'),
                'Organizer' => $this->request->getVar('Organizer'),
                'Start_date' => $this->request->getVar('Start_date'),
                'End_date' => $this->request->getVar('End_date'),
                'Status' => 'Draft',
                'Atendees' => $this->request->getVar('Atendees'),
                'adminId' => $this->request->getVar('adminId'),
                'type' => 'user',
            ];
            $categories = $this->request->getVar('Category');
            if (!empty($categories)) {
                $data['Category'] = implode(', ', $categories);
            }
    
            $this->userevent->save($data);
    
            return redirect()->to('/usereventpost')->with('success', 'Data has been Uploaded');
        }
        else
        {
            return redirect()->to('/newsAndEvents')->with('error', 'Error uploading image.');
        }
    }
    else{
        $data['validation'] = $this->validator;
        echo'Invalid, try again.';
    }
    }
}
