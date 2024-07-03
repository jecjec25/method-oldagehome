<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\UsersModel;
use App\Models\UserbookingModel;
use CodeIgniter\I18n\Time;

class UserController extends BaseController
{
    private $user;
    private $userbooking;
    public function __construct(){

        $this->user = new UsersModel();
        $this->userbooking = new UserbookingModel();

        helper(['form', 'url']);

    }
    public function signin(){
        
        return view('user/signin');
    }
    public function index()
    {
        helper(['form']);
        // $data['GoogleLogin'] = '<a href="'. $this->googleClient->createAuthUrl() .'">Use Google</a>';
        return view('user/signin');
    }

    // public function GoogleAuthLogin()
    // {
    //     $token = $this->googleClient->fetchAccessTokenWithAuthCode($this->request->getVar('code'));
    //     if (!isset($token['error'])) {
    //         $this->googleClient->setAccessToken($token['access_token']);
    //         session()->set("AccessToken", $token['access_token']);


    
    //         $googleService = new \Google_Service_Oauth2($this->googleClient);
    //         $data = $googleService->userinfo->get();
    //         echo "<pre> "; print_r($data); die;
    //     //     $currentDateTime = date("Y-m-d H:i:s");
            
    //     //     $userdata = [
    //     //         'name' => $data['givenName'] . " " . $data['familyName'],
    //     //         'email' => $data['email'],
    //     //         'profile_img' => $data['picture'],
    //     //         'updated_at' => $currentDateTime
    //     //     ];
    
    //     //     if ($this->userModel->isAlreadyRegister($data['id'])) {
    //     //         $this->userModel->updateUserData($userdata, $data['id']);
    //     //     } else {
    //     //         // New user registration
    //     //         $userdata['oauth_id'] = $data['id'];
    //     //         $userdata['created_at'] = $currentDateTime;
    //     //         $this->userModel->insertUserData($userdata);
    //     //     }
    
    //     //     session()->set("LoggedUserData", $userdata);
    //     //     return redirect()->to(base_url() . "/profile");
    //     // } else {
    //     //     session()->setFlashData("Error", "Something went wrong");
    //     //     return redirect()->to(base_url());
    //      }
    // }
    
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
                'is_verified'=> $user['is_verified'],
                'user_img'       => $user['user_img'],
                'isLoggedIn' => TRUE,
            ];
            $session->set($ses_data);

            if($user['role'] === 'Admin' )
            {
                if ($user['is_verified'] == 0) {
                    return redirect()->to('/verify-email');
                }
                elseif ($user['is_verified'] == 1) {
                    return redirect()->to('dashboard');
                }
               
            }
            
            elseif($user['role'] === 'MainAdmin' )
            {
                return redirect()->to('dashboard');
            }
            elseif($user['role'] === 'Booker')
            {
                
                if ($user['is_verified'] == 0) {
                    return redirect()->to('/verify-email');
                }
                elseif ($user['is_verified'] == 1) {
                    return redirect()->to('userViewpost');
                }
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