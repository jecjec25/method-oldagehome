<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\UsersModel;
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
            'lastname'  => 'required|min_length[2]|max_length[100]',
            'firstname' => 'required|min_length[2]|max_length[100]',
            'address' => 'required|min_length[2]|max_length[100]',
            'contactnum' => 'required|min_length[11]|max_length[13]',
            'username' => 'required|min_length[4]|max_length[100]',
            'email' => 'required|min_length[4]|max_length[100]|valid_email|is_unique[usertbl.email]',
            'password' => 'required|min_length[10]|max_length[100]',
        ];

        if($this->validate($validation))
        {
            $user = new UsersModel();
            $data =[
                'lastname' => $this->request->getVar('lastname'),
                'firstname' => $this->request->getVar('firstname'),
                'address' =>  $this->request->getVar('address'),
                'contactnum' => $this->request->getVar('contactnum'),
                'username' => $this->request->getVar('username'),
                'email' => $this->request->getVar('email'),
                'password' => password_hash($this->request->getVar('password'), PASSWORD_DEFAULT),
            ];
            $user->save($data);
            return redirect()->to('admin/dash');
            
        }
        else{
            $data['validation'] = $this->validator;
            echo view('admin/dash', $data);
        }
    }
}