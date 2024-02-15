<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\UsersModel;

class SigninController extends BaseController
{
    public function signin(){
        return view('user/login');
    }
    public function index()
    {
        helper(['form']);
        return view('signin');
    }
    public function loginAuth()
    {
        $session = session();
        $user = new UsersModel();
        $Username = $this->request->getVar('Username');
        $Password = $this->request->getVar('Password');

        $data = $user->where('Username', $Username)->first();

        if($data){
            $Password = $data['Password'];
            $authenticatePassword = password_verify($Password, $Password);
            if ($authenticatePassword){
                $ses_data = [
                    'Id' => $data['Id'],
                    'Username' => $data['Username'],
                    'Email' => $data['Email'],
                    'isLoggedIn' => TRUE
                ];
                $session->set($ses_data);
                return redirect()->to('/profile');
            }else{
                $session->setFlashdata('msg', 'Password is incorrect.');
                return redirect()->to('/signin');
            }
        }else{
            $session->setFlashdata('msg',  'Username does not exist.');
            return redirect()->to('/signin');
        }

    }
}