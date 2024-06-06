<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\UsersignModel;
use CodeIgniter\I18n\Time;

class UsersigninController extends BaseController
{
    private $user;

    public function __construct() {
        $this->user = new UsersignModel();
    }
    public function usersignin(){
        return view('admin/usersignin');
    }
    public function indexes()
    {
        helper(['form']);
        return view('user/signin'); 
    }

    public function userLogin()
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
                        'id' => $user['id'],
                        'LastName' => $user['LastName'],
                        'FirstName' => $user['FirstName'],
                        'Username' => $user['Username'],
                        'Email' => $user['Email'],
                        'ContactNo' => $user['ContactNo'],
                        'Password' => $user['Password']                 
                            ];
                    $session->set($ses_data);

                    if ($user['is_verified'] == 0) {
                        return redirect()->to('/verify-email');
                    }
                    elseif($user['is_verified'] == 1)
                    {
                        return redirect()->to('/booking');
                    }
                        }
            else
            {
                $session->setFlashdata('msg', 'Incorrect Password');

                return redirect()->to('/usersignin');
            }

        }
        else 
        {
            $session->setFlashdata('msg', 'Invalid Email');
            return redirect()->to('/usersignin');

        }
    }

    public function index()
    {
        helper(['form']);
        $data = [];
        return view('admin/usersignup', $data);
    }
    public function updateuserProfile($id)
    {
        $user = new UsersignModel();
        $data = [
            'LastName'     => $this->request->getVar('LastName'),
            'FirstName'     => $this->request->getVar('FirstName'),
            'Username'     => $this->request->getVar('Username'),
            'Email'    => $this->request->getVar('Email'),
            'ContactNo'    => $this->request->getVar('ContactNo'),
            'birthday'    => $this->request->getVar('birthday'),
         ];
         $user->update($id, $data);  
        session()->set($data);
        return redirect()->to('/userViewpost');
       
        
    }
    public function usersignup()
    {

        $rules = [
            'LastName'   => 'required|max_length[30]',
            'FirstName'  => 'required|max_length[30]',
            'Username'   => 'required|max_length[30]',
            'Email'      => 'required|max_length[254]|valid_email',
            'ContactNumber' => 'required|max_length[13]|min_length[10]',
            'Password'   => 'required|max_length[255]|min_length[10]',
        ];
          
        if($this->validate($rules)){
            $data = [
                'LastName'     => $this->request->getVar('LastName'),
                'FirstName'     => $this->request->getVar('FirstName'),
                'Username'     => $this->request->getVar('Username'),
                'Email'    => $this->request->getVar('Email'),
                'ContactNo'    => $this->request->getVar('ContactNumber'),
                'Password' => password_hash($this->request->getVar('Password'), PASSWORD_DEFAULT)
            ];
            $this->user->save($data);
            session()->setFlashdata('success', 'Saved successfully. You can now login');
            return redirect()->to('usersignin');
            
        }else{
            $data['validation'] = $this->validator;
            return view('admin/usersignup', $data);
        }
    }

    public function userProfile()
    {
        return view('admin/userprofile');
    }
    public function logout()
    {
        session_destroy();

        return redirect()->to('/usersignin');
        }

}
