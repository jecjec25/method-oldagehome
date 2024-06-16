<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\EventsModel;
use App\Models\FeedbackModel;
use App\Models\UserbookingModel;
class EventsController extends BaseController
{
    private $userbooking;
    private $admevent;
    private $feedback;

    public function __construct()
    {
        date_default_timezone_set('Asia/Manila');
        $this->userbooking = new UserbookingModel();
        $this->admevent = new EventsModel();
        $this->feedback = new FeedbackModel();
        helper(['form']);
    }

    public function adminevents()
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
 
        return view('dashboard/adminevents', $data);
    }

    public function saveEvents()
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

                $image->move($imagePath . '/upload/events/', $myImage);
        
                $data = [
                    'Attachments' => $image,
                    'Attachments' => $myImage,
                    'Title' => $this->request->getVar('Title'),
                    'Description' => $this->request->getVar('Description'),
                    'Organizer' => $this->request->getVar('Organizer'),
                    'Start_date' => $this->request->getVar('Start_date'),
                    'End_date' => $this->request->getVar('End_date'),
                    'Status' => 'Draft',
                    'Atendees' => $this->request->getVar('Atendees'),
                    'adminId' => $this->request->getVar('adminId'),
                    'type' => 'admin',
                ];

                $categories = $this->request->getVar('Category');
                if (!empty($categories)) {
                    $data['Category'] = implode(', ', $categories);
                }
        
                $this->admevent->save($data);
        
                return redirect()->to('/adevents')->with('success', 'Data has been Uploaded');
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

    public function Viewevents()
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
 
      $data['main'] =  $this->admevent->where('Status', 'Draft')->findAll();

        return view('dashboard/manageEvents', $data);
    }

    public function update($id)
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
 
        $data['main'] = $this->admevent->where('EventID', $id)->first();

        return view('dashboard/editevents', $data);

    }
    public function EditEvents($id)
    {
        // Fetch the existing event data
        $existingEvent = $this->admevent->find($id);
    
        $rules = [
            'Title'       => 'required|min_length[5]',
            'Description' => 'required|min_length[5]',
            'Organizer'   => 'required|min_length[5]',
            'Atendees'    => 'required|min_length[5]',
            'Category'    => 'required',
        ];
    
        if ($this->validate($rules)) {
            $imagePath = $_SERVER['DOCUMENT_ROOT'];
            $image = $this->request->getFile('Attachments');
    
            $data = [
                'Title'       => $this->request->getVar('Title'),
                'Description' => $this->request->getVar('Description'),
                'Organizer'   => $this->request->getVar('Organizer'),
                'Start_date'  => $this->request->getVar('Start_date'),
                'End_date'    => $this->request->getVar('End_date'),
                'Status'      => $this->request->getVar('Status'),
                'Atendees'    => $this->request->getVar('Atendees'),    
            ];
    
            $categories = $this->request->getVar('Category');
            if (!empty($categories)) {
                $data['Category'] = implode(', ', $categories);
            }
    
            if ($image && $image->isValid() && !$image->hasMoved()) {
                $myImage = $image->getRandomName();
                $image->move($imagePath . '/upload/events/', $myImage);
                $data['Attachments'] = $myImage;
            } else {
                // Use the existing image if no new image is uploaded
                $data['Attachments'] = $existingEvent['Attachments'];
            }
    
            $this->admevent->update($id, $data);
    
            return redirect()->to('/Viewevents')->with('success', 'Event details updated successfully');
        } else {
            $data['validation'] = $this->validator;
            return view('dashboard/editevents', $data);
        }
    }
    
    public function Archive()
    {
        $events = $this->request->getVar('update');

        $update = $this->eventsDetails($events);
                        $this->updateMyVisibility($update);
        return redirect()->to('/Viewevents');
    }

    private function eventsDetails($events)
    {
        $update = $this->admevent->where('EventID', $events)->first();

        return $update;
            
    }

    private function updateMyVisibility($update)
    {
        $data = [
            'Status' => 'Archive',
        ];

        $this->admevent->update($update, $data);
        
    }
    public function searchevents()
    {
        $searchevents = $this->request->getVar('searchevents');
        if($searchevents)
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
            'countNotifs' => $this->userbooking->where('status', 'pending')->countAllResults(),
            'main' => $this->admevent->like('Title', $searchevents)->where('Status', 'Draft')->findAll()
            ];
            return view('dashboard/searchevents',$data);
        }
    }

    public function initialpublishedevent()
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
            'countNotifs' => $this->userbooking->where('status', 'pending')->countAllResults(),
            'currentDate' => date('Y-m-d H:i:s')
        ];
 
        $data['main'] = $this->admevent->where('Status', 'published')->findAll();
        return view('dashboard/eventspublished', $data);
    }
    public function viewpublishevent($id)
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
 
            $data['event'] = $this->admevent->where('id', $id)->findAll();
            return view('dashboard/viewevent', $data);
    }
    public function eventsarchived()
    {
        $currentDate = date('Y-m-d H:i:s');
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
            'countNotifs' => $this->userbooking->where('status', 'pending')->countAllResults(),
            'currentDate' => date('Y-m-d H:i:s')
        ];
 
       $data['main']= $this->admevent->where('Status','Archive')->orwhere('End_date <=', $currentDate)->findAll();
        return view('dashboard/eventsarchived', $data);
    }

    public function deleteEventArch($Id = null)
    {
        $admevent = new EventsModel();
        $data = $admevent->where('EventID', $Id)->delete($Id);
        return $this->response->redirect(site_url('/eventsarchive'));
    }

    public function EventPubArc()
    {
        $events = $this->request->getVar('updateEve');

        $updateEve = $this->EventPublishedArch($events);
                        $this->updateMyEvePublished($updateEve);
        return redirect()->to('/publishedevents');
    }

    private function EventPublishedArch($events)
    {
        $updateEve = $this->admevent->where('EventID', $events)->first();
        return $updateEve;
    }

    private function updateMyEvePublished($updateEve)
    {
        $data = [
            'Status' => 'Archive',
        ];
        $this->admevent->update($updateEve, $data);
        
    }
    public function reservations()
    {
        
      return view('dashboard/adminevents', $reservedDates);
    }

    public function savefeedbackevent()
    {
        $id = $this->request->getVar('eventid');
        $data = [
            'feedback' => $this->request->getVar('feedback'),
            'usersignsId' => $this->request->getVar('usersignsId'),
            'eventid' => $this->request->getVar('eventid'),
            'status' => 'Pending'
        ];

        $this->feedback->save($data);
        session()->setFlashdata('feedback_message', 'Your data has been submitted as feedback');

        return redirect()->to('/eventForUsers/'. $id);

    }
       
}