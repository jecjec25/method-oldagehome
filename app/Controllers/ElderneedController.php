<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ElderneedModel;

class ElderneedController extends BaseController
{
    private $elneed;

    public function __construct()
    {
        $this->elneed = new ElderneedModel();
    }

    public function viewelderneed()
    {
        return view('dashboard/elderneed');
    }

    public function saveneed()
    {
        $data = [
            'need' => $this->request->getPost('need'),
            'description' => $this->request->getPost('description'),
        ];

        $this->elneed->save($data);
        return redirect()->to('/viewelderneed');
    }
}
