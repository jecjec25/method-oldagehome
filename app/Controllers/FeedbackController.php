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
        
        $data['feedevents'] = $this->feedback->select('feedbacktbl.id, feedbacktbl.usersignsId, feedbacktbl.eventid,feedbacktbl.status,
        feedbacktbl.announceid, feedbacktbl.feedback, user.userID, user.LastName, user.FirstName, events.EventID, events.Title, events.Description, events.Organizer')
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


     $data['feedannounce'] = $this->feedback->select('feedbacktbl.id, feedbacktbl.usersignsId, feedbacktbl.eventid, feedbacktbl.status,
        feedbacktbl.announceid, feedbacktbl.feedback, announcement.AnnounceID, announcement.Title, announcement.Content, announcement.Author')
        ->join('announcement', 'announcement.AnnounceID = feedbacktbl.announceid')
        ->findAll();

        // var_dump($data);
        return view('dashboard/feedbackannounce', $data);
    }

    public function deleteFeedEvents($id)
    {

        $this->feedback->delete($id);

        return redirect()->to('eventfeedback');
    }
    public function deleteFeedannounced($id)
    {

        $this->feedback->delete($id);

        return redirect()->to('announcefeedback');
    }

    public function updatetoAccept()
    {
        $accept = $this->request->getVar('accept');

        $update = $this->viewFeedback($accept);
                 $this->updateMyVisibility($update);
        return redirect()->to('/eventfeedback');
    }

    private function viewFeedback($accept)
    {
        $update = $this->feedback->where('id', $accept)->first();

        return $update;
    }

    private function updateMyVisibility($update)
    {
        $data = [
            'status' => 'Accepted',
        ];

        $this->feedback->update($update, $data);
        
    }

    
    public function updatetoAcceptAnn()
    {
        $accept = $this->request->getVar('accept');

        $update = $this->viewFeedbackAnn($accept);
                 $this->updateMyVisibilityAnn($update);
        return redirect()->to('/announcefeedback');
    }

    private function viewFeedbackAnn($accept)
    {
        $update = $this->feedback->where('id', $accept)->first();

        return $update;

        
    }

    private function updateMyVisibilityAnn($update)
    {
        $data = [
            'status' => 'Accepted',
        ];

        $this->feedback->update($update, $data);
        
    }
}
