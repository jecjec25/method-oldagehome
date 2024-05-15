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

        if(empty($data))
        {
            echo 'no data to show';
        }
        return view ('admin/userEventPost', $data);
    }

    public function usersavepost()
    {
      
        $data = [
            'usersignsId' => $this->request->getPost('usersignsId'),
            'Title' => $this->request->getPost('Title'),
            'Description' => $this->request->getPost('Description'),
            'Organizer' => $this->request->getPost('Organizer'),
            'Start_date' => $this->request->getPost('Start_date'),
            'End_date' => $this->request->getPost('End_date'),
            'Category' => $this->request->getPost('Category'),
            'Atendees' => $this->request->getPost('Atendees'),
            'Attachments' => $this->request->getPost('Attachments'),
            'Status' => 'Draft',
            'type' => 'user',
        ];
        $categories = $this->request->getVar('Category');
        if (!empty($categories)) {
            $data['Category'] = implode(', ', $categories);
        }
        $userevent = new EventsModel();

        $userevent->save($data);
        session()->setFlashdata('success', 'The data has been saved sucessfully.');
        return redirect()->to('/usereventpost');
    }
}
