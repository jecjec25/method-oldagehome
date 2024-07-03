<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ElderneedModel;
use App\Models\DonationModel;


class MenuController extends BaseController
{

    private $elneed;
    private $donation;
    public function __construct()
    {
        $this->elneed = new ElderneedModel();
        $this->donation  = new DonationModel();
    }

    public function seemenu()
    {
        $data['menu'] = $this->elneed->findAll();
        $data = ['mes' =>  $this->donation->findAll(),
       'menu' => $this->elneed->findAll()];
       return view('admin/menu', $data);
    }
}
