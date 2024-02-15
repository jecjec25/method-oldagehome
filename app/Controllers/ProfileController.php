<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\UserModel;

class ProfileController extends BaseController
{
    public function index(){
        $session = session();
        return "Hello : ".$session->get('Name');
    }
}