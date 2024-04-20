<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class UserDonationController extends BaseController
{
    public function userdonation()
    {
        return view('admin/userdonationsite');
    }
}
