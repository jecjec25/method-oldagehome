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

    public function displayelderneed()
    {
        $data['eneed'] = $this->elneed->findAll();
        return view ('dashboard/manageneed', $data);
    }
    
    public function viewToupdate($id)
    {
        $data['viewneed'] = $this->elneed->where('id', $id)->first();


        return view('dashboard/editelderneed', $data);
    }
    public function editelderneed($id)
    {
        date_default_timezone_set('UTC');
        $currentTimestamp = date('Y-m-d H:i:s');

        $data = [
            'need' => $this->request->getPost('need'),
            'description' => $this->request->getPost('description'),
            'date_modified' =>  $currentTimestamp,
        ];
    
        $this->elneed->update($id, $data);
    
        return redirect()->to('/manageneed')->with('success', 'Senior Citizen details updated successfully');
    }

    public function deleteneed($id = null)
    {
        $this->elneed->delete($id);
        return $this->response->redirect(site_url('/manageneed'));
    }
}
