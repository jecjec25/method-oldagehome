<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ContactModel;
class ContactController extends BaseController
{
    public function __construct(){
        // $this->user = new App\Models\UserModel();
    }
    public function contact()
    {
        helper(['form']);
        $data=[];
        return view('admin/contact');
    }
    public function submit()
    {
        helper(['form']);
        $validation = [
            'FirstName' => 'required|min_length[2]|max_length[100]',
            'LastName'  => 'required|min_length[2]|max_length[100]',
            'Email' => 'required|min_length[4]|max_length[100]|valid_email|is_unique[]',
            'Phone' => 'required|min_legnth[11]|numeric|max_length[13]',
            'Message'  => 'required|min_length[2]|max_length[100]',
        ];

        if($this->validate($validation))
        {
            $user = new ContactModel();
            $data =[
                'FirstName' => $this->request->getVar('FirstName'),
                'LastName' => $this->request->getVar('LastName'),
                'Email' => $this->request->getVar('Email'),
                'Phone' => $this->request->getVar('Phone'),
                'Message' => $this->request->getVar('Message'),
            ];
            $user->save($data);
            return redirect()->to('');
            
        }
        else{
            $data['validation'] = $this->validator;
            echo view('main/contact', $data);
        }
    }
}