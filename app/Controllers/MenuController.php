<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ElderneedModel;

class MenuController extends BaseController
{

    private $elneed;

    public function __construct()
    {
        $this->elneed = new ElderneedModel();
    }

    public function seemenu()
    {
        $data['menu'] = $this->elneed->findAll();
       return view('admin/menu', $data);
    }
}
