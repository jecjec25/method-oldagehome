<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\UsersModel;
use App\Models\UserbookingModel;
class UserController extends BaseController
{
    private $user;
    private $userbooking;
    public function __construct(){
        $this->user = new UsersModel();
        $this->userbooking = new UserbookingModel();
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
            'countNotifs' => $this->userbooking->where('status', 'pending')->countAllResults()
        ];

        return view('dashboard/profile', $data);
    }
    public function updateProfile($id)
    {
        $image = $this->request->getFile('user_img');
        $imagePath = $_SERVER['DOCUMENT_ROOT'];
        $user = new UsersModel();
        if ($image && $image->isValid() && !$image->hasMoved()) 
        {
            $myImage = $image->getRandomName();

            $image->move($imagePath . '/upload/user_images/',  $myImage);
        $data = [
            'user_img' => $image,
            'user_img' => $myImage,
            'LastName'     => $this->request->getVar('LastName'),
            'FirstName'    => $this->request->getVar('FirstName'),
            'Username'     => $this->request->getVar('Username'),
            'Email'        => $this->request->getVar('Email'),
            'ContactNo'    => $this->request->getVar('ContactNo'),
            'birthday'     => $this->request->getVar('birthday'),
         ];

         $user->update($id, $data);

         session()->set($data);
        return redirect()->to('dashboard')->with('msg', 'Profile has been Successfully Update');
        }

        else{


            $data = [
                'LastName'     => $this->request->getVar('LastName'),
                'FirstName'    => $this->request->getVar('FirstName'),
                'Username'     => $this->request->getVar('Username'),
                'Email'        => $this->request->getVar('Email'),
                'ContactNo'    => $this->request->getVar('ContactNo'),
                'birthday'     => $this->request->getVar('birthday'),
             ];
    
             $user->update($id, $data);
             session()->set($data);
            return redirect()->to('dashboard')->with('msg', 'Profile has been Successfully Update');
        }
        
    }
    public function updateuserProfile($id)
    {
        
        $data = [
            'LastName'     => $this->request->getVar('LastName'),
            'FirstName'     => $this->request->getVar('FirstName'),
            'Username'     => $this->request->getVar('Username'),
            'Email'    => $this->request->getVar('Email'),
            'ContactNo'    => $this->request->getVar('ContactNo'),
            'birthday'    => $this->request->getVar('birthday'),
         ];
         $this->user->update($id, $data);
         session()->set($data);
        return redirect()->to('/userViewpost');
        
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
                'userID'     => $user['userID'],
                'LastName'   => $user['LastName'],
                'FirstName'  => $user['FirstName'],
                'Username'   => $user['Username'],
                'Email'      => $user['Email'],
                'ContactNo'  => $user['ContactNo'],
                'birthday'   => $user['birthday'],
                'role'       => $user['role'],
                'user_img'       => $user['user_img'],
                'isLoggedIn' => TRUE,
            ];
            $session->set($ses_data);

            if($user['role'] === 'Admin' )
            {
                return redirect()->to('dashboard');
            }
            
            elseif($user['role'] === 'MainAdmin' )
            {
                return redirect()->to('dashboard');
            }
            elseif($user['role'] === 'Booker')
            {
                return redirect()->to('userViewpost');
            }
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