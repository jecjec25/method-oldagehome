<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\EventsModel;

class EventsController extends BaseController
{
    private $admevent;

    public function __construct()
    {
        $this->admevent = new EventsModel();
        helper(['form']);
    }

    public function adminevents()
    {
        return view('dashboard/adminevents');
    }

    public function saveEvents()
        {

            $rules = [
                'Title'   => 'required|min_length[5]',
                'Description'   => 'required|min_length[10]',
                'Organizer'  => 'required|min_length[5]',
                'Atendees'  => 'required|min_length[5]',
                'Category'   => 'required',
            ];

            $image = $this->request->getFile('Attachments');
            if($this->validate($rules))
            {

            if ($image && $image->isValid() && !$image->hasMoved()) 
            {
                $myImage = $image->getRandomName();

                $image->move(WRITEPATH . 'uploads', $myImage);
        
                $data = [
                    'Attachments' => $image,
                    'Attachments' => 'uploads/' . $myImage,
                    'Title' => $this->request->getVar('Title'),
                    'Description' => $this->request->getVar('Description'),
                    'Organizer' => $this->request->getVar('Organizer'),
                    'Start_date' => $this->request->getVar('Start_date'),
                    'End_date' => $this->request->getVar('End_date'),
                    'Status' => 'Draft',
                    'Atendees' => $this->request->getVar('Atendees'),
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
      $data['main'] =  $this->admevent->where('Status', 'Draft')->findAll();

        return view('dashboard/manageEvents', $data);
    }

    public function update($id)
    {
        $data['main'] = $this->admevent->where('EventID', $id)->first();

        return view('dashboard/editevents', $data);

    }
    public function EditEvents($id)
    {

        $data = [
            'Title' => $this->request->getVar('Title'),
            'Description' => $this->request->getVar('Description'),
            'Organizer' => $this->request->getVar('Organizer'),
            'Start_date' => $this->request->getVar('Start_date'),
            'End_date' => $this->request->getVar('End_date'),
            'Atendees' => $this->request->getVar('Atendees'),
            'Status'   => $this->request->getVar('Status'),
            'Attachments' => $this->request->getVar('Attachments'),
        ];

        $categories = $this->request->getVar('Category');
        if (!empty($categories)) {
            $data['Category'] = implode(', ', $categories);
        }
        $this->admevent->update($id, $data);

        return redirect()->to('/Viewevents')->with('success', 'Senior Citizen details updated successfully');

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
                'main' => $this->admevent->like('Title', $searchevents)->findAll()
            ];
            return view('dashboard/searchevents',$data);
        }
    }

    public function initialpublishedevent()
    {
        $data['main'] = $this->admevent->where('Status', 'published')->findAll();
        return view('dashboard/eventspublished', $data);
    }
    public function viewoublishevent($id)
    {
            $data['event'] = $this->admevent->where('id', $id)->findAll();
            return view('dashboard/viewevent', $data);
    }
    public function eventsarchived()
    {
       $data['main']= $this->admevent->where('Status','Archive')->findAll();
        return view('dashboard/eventsarchived', $data);
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
       
}