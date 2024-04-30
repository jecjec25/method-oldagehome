<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\FeedbackModel;
class FeedbackController extends BaseController
{
    private $feedback;
    
    public function __construct()
    {
        $this->feedback = new FeedbackModel();
    }
    

    public function feedbackEvents()
    {
     
    }

    public function viewfeedbackevent()
    {
        $data['feedevents'] = $this->feedback->select('feedbacktbl.id, feedbacktbl.usersignsId, feedbacktbl.eventid,
        feedbacktbl.announceid, feedbacktbl.feedback, usersigns.id, usersigns.LastName, usersigns.FirstName, events.EventID, events.Title')
        ->join('usersigns', 'usersigns.id = feedbacktbl.usersignsId')
        ->join('events', 'events.EventID = feedbacktbl.eventid')
        ->findAll();

        // var_dump($data);
        return view('dashboard/feedbackeven', $data);
    }

    public function viewfeedbackannounce()
    {
        $data['feedannounce'] = $this->feedback->select('feedbacktbl.id, feedbacktbl.usersignsId, feedbacktbl.eventid,
        feedbacktbl.announceid, feedbacktbl.feedback, announcement.AnnounceID, announcement.Title, announcement.Content, announcement.Author')
        ->join('announcement', 'announcement.AnnounceID = feedbacktbl.announceid')
        ->findAll();

        // var_dump($data);
        return view('dashboard/feedbackannounce', $data);
    }
}
