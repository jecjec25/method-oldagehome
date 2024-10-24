<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\UsersModel;
use App\Models\UserbookingModel;
use CodeIgniter\I18n\Time;

class SignupController extends BaseController
{
    private $user;
    private $userbooking;

    public function __construct()
    {
        $this->user = new UsersModel();
        $this->userbooking = new UserbookingModel();
        helper(['form', 'url']);
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
            $verificationToken = bin2hex(random_bytes(16));
            $data = [
                'LastName'     => $this->request->getVar('LastName'),
                'FirstName'     => $this->request->getVar('FirstName'),
                'Username'     => $this->request->getVar('Username'),
                'Email'    => $this->request->getVar('Email'),
                'ContactNo'    => $this->request->getVar('ContactNumber'),
                'role'         => 'Booker',
                'verification_token' => $verificationToken,
                'birthday'    => $this->request->getVar('birthday'),
                'Password' => password_hash($this->request->getVar('Password'), PASSWORD_DEFAULT)
            ];
            $userModel->save($data);
            $this->sendVerificationEmail($this->request->getVar('Email'), $verificationToken);

            session()->setFlashdata('success', 'Saved. Please verify your email address in your email account.');
            return redirect()->to('signin');
        }else{
            $data['validation'] = $this->validator;
            return view('user/signup', $data);
        }
    }
    public function verifyEmailReminder()
    {
        return view('admin/verify_email_reminder');
    }
    private function sendVerificationEmail($email, $token)
    {
        $emailService = \Config\Services::email();
        $emailService->setTo($email);
        $emailService->setFrom('aruga.kapatid@gmail.com', 'Hapag Aruga Foundation');
        $emailService->setSubject('Email Verification');
        $emailService->setMessage("Thank you for registering your account to Hapag Aruga Foundation Incorporated. Please click the link below to verify your email address:\n\n" . base_url() . "/verify/$token");

        $emailService->send();
    }

    public function verify($token)
    {
        $userModel = new UsersModel();
        $user = $userModel->where('verification_token', $token)->first();

        if ($user) {
            $userModel->update($user['userID'], ['is_verified' => true, 'verification_token' => null]);

            return redirect()->to('/signin')->with('message', 'Email verified successfully. You can now login.');
        }

        return redirect()->to('/login')->with('error', 'Invalid verification token.');
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
                $verificationToken = bin2hex(random_bytes(16));
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
                'verification_token' => $verificationToken,
                'Password' => password_hash($this->request->getVar('Password'), PASSWORD_DEFAULT)
            ];
            $userModel->save($data);
            $this->sendVerificationEmail($this->request->getVar('Email'), $verificationToken);

            session()->setFlashdata('success', 'Saved. Please verify your email address in your email account.');
            return redirect()->to('viewAdminRegister');
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
                session()->setFlashdata('success', 'Saved. Please verify your email address in your email account.');
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
    public function deleteUser($id){
        $this->user->delete($id);

        return redirect()->to('viewUsers');
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

