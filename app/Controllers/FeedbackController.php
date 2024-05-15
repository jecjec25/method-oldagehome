<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\FeedbackModel;
use App\Models\UserbookingModel;
class FeedbackController extends BaseController
{
    private $feedback;
    private $userbooking;
    public function __construct()
    {
        $this->userbooking = new UserbookingModel();
        $this->feedback = new FeedbackModel();
    }
    

    public function feedbackEvents()
    {
     
    }

    public function viewfeedbackevent()
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
        
        $data['feedevents'] = $this->feedback->select('feedbacktbl.id, feedbacktbl.usersignsId, feedbacktbl.eventid,
        feedbacktbl.announceid, feedbacktbl.feedback, user.userID, user.LastName, user.FirstName, events.EventID, events.Title')
        ->join('user', 'user.userID = feedbacktbl.usersignsId')
        ->join('events', 'events.EventID = feedbacktbl.eventid')
        ->findAll();

        // var_dump($data);
        return view('dashboard/feedbackeven', $data);
    }

    public function viewfeedbackannounce()
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
     $data['feedannounce'] = $this->feedback->select('feedbacktbl.id, feedbacktbl.usersignsId, feedbacktbl.eventid,
        feedbacktbl.announceid, feedbacktbl.feedback, announcement.AnnounceID, announcement.Title, announcement.Content, announcement.Author')
        ->join('announcement', 'announcement.AnnounceID = feedbacktbl.announceid')
        ->findAll();

        // var_dump($data);
        return view('dashboard/feedbackannounce', $data);
    }
}
