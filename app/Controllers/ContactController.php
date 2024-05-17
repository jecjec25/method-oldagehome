<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ContactModel;
use App\Models\UserbookingModel;
class ContactController extends BaseController
{
    private $contact;
    private $userbooking;
    public function __construct()
    {
        $this->userbooking = new UserbookingModel();
        $this->contact = new ContactModel();
        helper(['form']);
    }
    
    public function contactu()
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
        $data['cont'] = $this->contact->where('contact_status', 'Unread')->findAll();
        return view('dashboard/unreadq', $data);
    }

    public function updateRead()
    {
        $contacts = $this->request->getVar('update');

        $updateToRead = $this->myContact($contacts);
                        $this->updateMyContact($updateToRead);
        return redirect()->to('/contactu');
    }

    private function myContact($contacts)
    {
        $updateToRead = $this->contact->where('Id', $contacts)->first();

        return $updateToRead;
    }

    private function updateMyContact($updateToRead)
    {
        $data = [
            'contact_status' => 'Read',
        ];

        $this->contact->update($updateToRead, $data);
        
    }

    public function updateUnread()
    {
        $unread = $this->request->getVar('update');

        $updateToUnread = $this->myReadContact($unread);
                        $this->updateMyReadContact($updateToUnread);
                        return redirect()->to('/readenq');
    }

    private function myReadContact($contacts)
    {
        $updateToUnread = $this->contact->where('Id', $contacts)->first();

        return $updateToUnread;
    }

    private function updateMyReadContact($updateToUnread)
    {
        $data = [
            'contact_status' => 'Unread',
        ];

        $this->contact->update($updateToUnread, $data);
        
    }
    public function check()
    {
        $Id = $this->request->getPost('Id');
        $data = [
            'Name' => $this->request->getPost('Name'),
            'Phone' => $this->request->getPost('Phone'),
            'Email' => $this->request->getPost('Email'),
            'Message' => $this->request->getPost('Message'),
            'contact_status' => 'Unread'
        ];
        
        $contact = new ContactModel();

        if (!empty($Id)){
            $contact->update($Id, $data);
        }
        else 
        {
            $contact->save($data);
        }
        session()->setFlashdata('success', 'The data has been saved sucessfully.');
        return redirect()->to('/contact');
    } 
    public function checked(){
        $contact = new ContactModel();
        $data['contact'] = $contact->findAll();
        return view ('/contactu', $data);
    }

    public function Unread()
    {
        $data['unread'] = $this->contact->where('contact_status', 'Unread')->findAll();

        return view ('/contactu', $data);
    }
}