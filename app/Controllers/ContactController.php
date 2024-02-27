<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ContactModel;
class ContactController extends BaseController
{
    private $contact;
    public function __construct()
    {
        $this->contact = new ContactModel();
    }
    public function contactu()
    {
        $contact = new ContactModel();
        $data['cont'] = $contact->findAll();
        return view('dashboard/unreadq', $data);
    }
    public function check()
    {
        $Id = $this->request->getPost('Id');
        $data = [
            'Name' => $this->request->getPost('Name'),
            'Phone' => $this->request->getPost('Phone'),
            'Email' => $this->request->getPost('Email'),
            'Message' => $this->request->getPost('Message'),
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
}