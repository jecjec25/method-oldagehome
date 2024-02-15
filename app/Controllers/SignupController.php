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
        return view('signup', $data);
    }

    public function store()
    {
        helper(['form']);
        $rules = [
            'LastName'          => 'required|min_length[2]|max_length[50]',
            'FirstName'          => 'required|min_length[2]|max_length[50]',
            'Username'          => 'required|min_length[2]|max_length[50]',
            'Email'         => 'required|min_length[4]|max_length[50]|valid_email|is_unique[users.email]',
            'ContactNum'          => 'required|min_length[2]|max_length[13]',
            'password'      => 'required|min_length[4]|max_length[50]',
        ];
          
        if($this->validate($rules)){
            $userModel = new UsersModel();
            $data = [
                'LastName'     => $this->request->getVar('LastName'),
                'FirstName'     => $this->request->getVar('FirstName'),
                'Username'     => $this->request->getVar('Username'),
                'Email'    => $this->request->getVar('Email'),
                'ContactNum'    => $this->request->getVar('ContactNum'),
                'password' => password_hash($this->request->getVar('password'), PASSWORD_DEFAULT)
            ];
            $userModel->save($data);
            return redirect()->to('/signin');
        }else{
            $data['validation'] = $this->validator;
            return view('signup', $data);
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
}
