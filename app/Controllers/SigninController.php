<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\UsersModel;

class SigninController extends BaseController
{
    private $user;

    public function __construct()
    {
        $this->user = new UsersModel();
    }
    public function signin(){
        return view('user/signin');
    }
    public function index()
    {
        helper(['form']);
        return view('user/signin');
    }
    public function loginAuth()
    {
        
        $session = session();
        $userModel = new UsersModel();
        $email = $this->request->getVar('Email');
        $password = $this->request->getVar('pass');
        
        $data = $userModel->where('Email', $email)->first();
        
        if($data){
            $pass = $data['Password'];
            $authenticatePassword = password_verify($password, $pass);
            if($authenticatePassword){
                $ses_data = [
                    'Id' => $data['Id'],
                    'LastName' => $data['LastName'],
                    'FirstName' => $data['FirstName'],
                    'Email' => $data['Email'],
                    'ContactNum' => $data['ContactNum'],
                    'Username' => $data['Username'],
                    'isLoggedIn' => TRUE
                ];
                $session->set($ses_data);
               return redirect()->to('/dashboard');
        
            
            }else{
                $session->setFlashdata('msg', 'Password is incorrect.');
                return redirect()->to('/signin');
            }
        }else{
            $session->setFlashdata('msg', 'Email does not exist.');
            return redirect()->to('/signin');
        }
        }

        public function logout()
        {
            session_destroy();
            return redirect()->to('/signin');
        }
}