<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\UsersModel;
use App\Models\UserbookingModel;

class SignupController extends BaseController
{
    private $user;
    private $userbooking;

    public function __construct()
    {
        $this->user = new UsersModel();
        $this->userbooking = new UserbookingModel();
    }
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
            'Password'   => 'required|max_length[255]|min_length[8]',
        ];
          
        if($this->validate($rules)){
            $userModel = new UsersModel();
            $data = [
                'LastName'     => $this->request->getVar('LastName'),
                'FirstName'     => $this->request->getVar('FirstName'),
                'Username'     => $this->request->getVar('Username'),
                'Email'    => $this->request->getVar('Email'),
                'ContactNo'    => $this->request->getVar('ContactNumber'),
                'role'         => 'Booker',
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

    public function Register()
    {
        return view('dashboard/adminUser/AddAdminUser');
    }
    public function AdminRegister()
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
            $image = $this->request->getFile('User_profile');
            $imagePath = $_SERVER['DOCUMENT_ROOT'];
           
            $userModel = new UsersModel();
            if ($image && $image->isValid() && !$image->hasMoved()) 
            {
                $myImage = $image->getRandomName();
    
                $image->move($imagePath . '/upload/user_images/',  $myImage);
            $data = [
                'user_img' => $image,
                'user_img' => $myImage,
                'LastName'     => $this->request->getVar('LastName'),
                'FirstName'     => $this->request->getVar('FirstName'),
                'Username'     => $this->request->getVar('Username'),
                'Email'    => $this->request->getVar('Email'),
                'ContactNo'    => $this->request->getVar('ContactNumber'),
                'role'         => 'Admin',
                'birthday'    => $this->request->getVar('birthday'),
                'Password' => password_hash($this->request->getVar('Password'), PASSWORD_DEFAULT)
            ];
            $userModel->save($data);
            session()->setFlashdata('success', 'Saved successfully. You can now signin');
            return redirect()->to('viewAdminRegister')->with('msg', 'You have Successfully Registered A new account');
            }

            else
            {
                $data = [
                    'user_img' => 'default.jpg',
                    'LastName'     => $this->request->getVar('LastName'),
                    'FirstName'     => $this->request->getVar('FirstName'),
                    'Username'     => $this->request->getVar('Username'),
                    'Email'    => $this->request->getVar('Email'),
                    'ContactNo'    => $this->request->getVar('ContactNumber'),
                    'role'         => 'Admin',
                    'birthday'    => $this->request->getVar('birthday'),
                    'Password' => password_hash($this->request->getVar('Password'), PASSWORD_DEFAULT)
                ];
                $userModel->save($data);
                session()->setFlashdata('success', 'Saved successfully. You can now signin');
                return redirect()->to('viewAdminRegister')->with('msg', 'You have Successfully Registered A new account');
            }
        }else{
            $data['validation'] = $this->validator;
            return view('dashboard/adminUser/AddAdminUser', $data);
        }
    }

    public function viewUsers()
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
            'countNotifs' => $this->userbooking->where('status', 'pending')->countAllResults(),
            'user' => $this->user->findAll()
        ];

       return view('dashboard/adminUser/viewAdminUsers', $data);
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

