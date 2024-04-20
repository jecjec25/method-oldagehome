<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class UserProductController extends BaseController
{
    public function userproduct()
    {
        return view('admin/userseeproduct');
    }
}
