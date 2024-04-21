<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class MenuController extends BaseController
{
    public function seemenu()
    {
        return view('admin/menu');
    }
}
