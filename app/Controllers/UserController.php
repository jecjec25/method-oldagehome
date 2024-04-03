<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\UsersModel;
class UserController extends BaseController
{
    private $user;
    public function __construct(){
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
    public function Admin()
    {
        return view('dashboard/profile');
    }
    public function updateProfile($id)
    {
        $user = new UsersModel();
        $data = [
            'LastName'     => $this->request->getVar('LastName'),
            'FirstName'     => $this->request->getVar('FirstName'),
            'Username'     => $this->request->getVar('Username'),
            'Email'    => $this->request->getVar('Email'),
            'ContactNo'    => $this->request->getVar('ContactNo'),
            'birthday'    => $this->request->getVar('birthday'),
         ];
         $user->update($id, $data);
        return redirect()->to('profile');
        
    }
    public function loginAuth()
    {
    $session = session();

    $email = $this->request->getVar('Email');
    $password = $this->request->getVar('Password');

    $user = $this->user->where('Email', $email)->first();

    if($user)
    {
        $pass = $user['Password'];

        $authenticatePassword = password_verify($password, $pass);

        if($authenticatePassword)
        {
            $ses_data = [
                'userID' => $user['userID'],
                'LastName' => $user['LastName'],
                'FirstName' => $user['FirstName'],
                'Username' => $user['Username'],
                'Email' => $user['Email'],
                'ContactNo' => $user['ContactNo'],
                'birthday' => $user['birthday'],
                'isLoggedIn' => TRUE,
            ];
            $session->set($ses_data);

            return redirect()->to('/dashboard');
        }

        else
        {
            $session->setFlashdata('msg', 'Incorrect Password');
            return redirect()->to('/signin');
        }
    }
    else
    {
        $session->setFlashdata('msg', 'Incorrect Email');
        return redirect()->to('/signin');
    }
    }

    public function logout()
    {
        session_destroy();

        return redirect()->to('/signin');
        }

}