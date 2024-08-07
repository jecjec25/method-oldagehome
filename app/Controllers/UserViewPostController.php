<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\NewsModel;
use App\Models\EventsModel;
use App\Models\AcceptbookingModel;

class UserViewPostController extends BaseController
{
    private $newsevents;
    private $events;
    private $acBooking;

    public function __construct()
    {
        date_default_timezone_set('Asia/Manila');
        $this->newevents = new NewsModel();
        $this->events = new EventsModel();
        $this->acBooking = new AcceptbookingModel();
        helper(['form']);
    }

    public function userViewpost()
    {

        $user = session()->get('userID');
        $data = [
            'eventadmin' => $this->events
                ->where('status', 'Published')
                ->where('type', 'admin')
                ->findAll(),
                'eventuser' => $this->events
                ->where('status', 'Published')
                ->where('type', 'user')
                ->findAll(),
            'notif' => $this->acBooking
                ->select('acceptbooking.id, acceptbooking.lastname, acceptbooking.firstname, 
                acceptbooking.middlename, acceptbooking.contactnum, acceptbooking.event, 
                acceptbooking.time, acceptbooking.prefferdate, acceptbooking.equipment, 
                acceptbooking.comments, acceptbooking.status, acceptbooking.usersignsId, 
                user.userID, user.LastName, user.FirstName')                                                                        
                ->join('user', 'user.userID = acceptbooking.usersignsId')
                ->where('acceptbooking.usersignsId', $user )
                ->findAll(),
                
        'notifs' => $this->acBooking
            ->select('acceptbooking.id, acceptbooking.lastname, acceptbooking.firstname, 
            acceptbooking.middlename, acceptbooking.contactnum, acceptbooking.event, 
            acceptbooking.time, acceptbooking.prefferdate, acceptbooking.equipment, 
            acceptbooking.comments, acceptbooking.status, acceptbooking.usersignsId, 
            user.userID, user.LastName, user.FirstName')
            ->join('user', 'user.userID = acceptbooking.usersignsId')
            ->where('acceptbooking.status', 'Accepted')->where('acceptbooking.usersignsId', $user )
            ->first(),
        'getCount' => $this->acBooking->select('Count(*) as notif')->where('acceptbooking.usersignsId', $user)->first(),
        'currentDate' => date('Y-m-d H:i:s')
        ];
        
        return view('admin/userViewpost', $data);
    }

    public function getNotif($id)
    {
        $data = ['getNotif' =>  $this->acBooking->where('id', $id)->first()];

        return view('admin/notif/getnotification', $data);
    }



}
