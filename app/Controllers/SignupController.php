<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\UsersModel;

class SignupController extends BaseController
{
    public function index()
    {
        helper(['form']);
        $data = [];
        return view('user/signup', $data);
    }

    public function store()
    {
        helper(['form']);
        $rules = [
            'LastName'   => 'required|max_length[30]',
            'FirstName'  => 'required|max_length[30]',
            'Username'   => 'required|max_length[30]',
            'Email'      => 'required|max_length[254]|valid_email',
            'ContactNumber' => 'required|max_length[13]|min_length[10]',
            'Password'   => 'required|max_length[255]|min_length[10]',
        ];
          
        if($this->validate($rules)){
            $userModel = new UsersModel();
            $data = [
                'LastName'     => $this->request->getVar('LastName'),
                'FirstName'     => $this->request->getVar('FirstName'),
                'Username'     => $this->request->getVar('Username'),
                'Email'    => $this->request->getVar('Email'),
                'ContactNo'    => $this->request->getVar('ContactNumber'),
                'birthday'    => $this->request->getVar('birthday'),
                'Password' => password_hash($this->request->getVar('Password'), PASSWORD_DEFAULT)
            ];
            $userModel->save($data);
            session()->setFlashdata('success', 'Saved successfully. You can now signin');
            return redirect()->to('signin');
        }else{
            $data['validation'] = $this->validator;
            return view('user/signup', $data);
        }
    }
}

    // public function loginAuth()
    // {
    //     $session = session();
    //     $userModel = new UsersModel();
    //     $email = $this->request->getVar('email');
    //     $password = $this->request->getVar('password');
        
    //     $data = $userModel->where('email', $email)->first();
        
    //     if($data){
    //         $pass = $data['password'];
    //         $authenticatePassword = password_verify($password, $pass);
    //         if($authenticatePassword){
    //             $ses_data = [
    //                 'id' => $data['id'],
    //                 'LastName' => $data['LastName'],
    //                 'FirstName' => $data['FirstName'],
    //                 'username' => $data['username'],
    //                 'contactno' => $data['contactno'],
    //                 'email' => $data['email'],
    //                 'isLoggedIn' => TRUE
    //             ];
    //             $session->set($ses_data);
    //             return redirect()->to('/profile');
            
    //         }else{
    //             $session->setFlashdata('msg', 'Password is incorrect.');
    //             return redirect()->to('/signin');
    //         }
    //     }else{
    //         $session->setFlashdata('msg', 'Email does not exist.');
    //         return redirect()->to('/signin');
    //     }
        
    // }

