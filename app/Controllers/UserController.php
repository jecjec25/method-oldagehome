<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\UserModel;
class UserController extends BaseController
{
    public function __construct(){
        // $this->user = new App\Models\UserModel();
    }
    public function register()
    {
        helper(['form']);
        $data=[];
        return view('user/register');
    //     $user = new UserModel();
    //    $data['user'] = $user->findAll();
    //     var_dump($data);
    }
    public function save()
    {
       
        helper(['form']);
        $validation = [
            'LastName'  => 'required|min_length[2]|max_length[100]',
            'FirstName' => 'required|min_length[2]|max_length[100]',
            'username' => 'required|min_length[4]|max_length[100]',
            'email' => 'required|min_length[4]|max_length[100]|valid_email|is_unique[]',
            'contactno' => 'required|min_legnth[11]|numeric|max_length[13]',
            'password' => 'required|min_length[10]|max_length[100]',
        ];

        if($this->validate($validation))
        {
            $user = new UserModel();
            $data =[
                'LastName' => $this->request->getVar('LastName'),
                'FirstName' => $this->request->getVar('FirstName'),
                'username' => $this->request->getVar('username'),
                'email' => $this->request->getVar('email'),
                'contactno' => $this->request->getVar('contactno'),
                'password' => password_hash($this->request->getVar('password'), PASSWORD_DEFAULT),
            ];
            $user->save($data);
            return redirect()->to('/login');
            
        }
        else{
            $data['validation'] = $this->validator;
            echo view('user/register', $data);
        }
    }
}
