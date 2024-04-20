<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class UserViewPostController extends BaseController
{
    public function userViewpost()
    {
        return view('admin/userViewpost');
    }
}
