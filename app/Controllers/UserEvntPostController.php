<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class UserEvntPostController extends BaseController
{
    public function index()
    {
        //
    }

    public function userEventpost()
    {
        return view ('admin/userEventPost');
    }
}
