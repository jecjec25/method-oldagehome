<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\MainModel;


class HomeController extends BaseController
{
    public function index(){
        $main = new MainModel();
        $data['main'] = $main->orderBy('Id', 'DESC')->findAll();
        return view('dashboard/managescdetails', $data);
    }
    public function create(){
        return view('dashboard/adddetails');
    }
    public function store() {
        $main = new MainModel();
        $data = [
            'Name' => $this->request->getVar('Name'),
            'DateBirth' => $this->request->getVar('DateBirth'),
            'ContNum' => $this->request->getVar('ContNum'),
            'ComAdd' => $this->request->getVar('ComAdd'),
            'ProfPic' => $this->request->getVar('ProfPic'),
            'EmergencyAdd' => $this->request->getVar('EmergencyAdd'),
            'EmergencyContNum' => $this->request->getVar('EmergencyContNum'),
            'RegDate'  => $this->request->getVar('RegDate'),
        ];
        $main->insert($data);
        return $this->response->redirect(site_url('/test'));
    }
    public function singleUser($Id = null){
        $main = new MainModel();
        $data['tblscdetails'] = $main->where('Id', $Id)->first();
        return view('dashboard/editscdetails', $data);
    }
    public function update(){
        $main = new MainModel();
        $Id = $this->request->getVar('Id');
        $data = [
            'Name' => $this->request->getVar('Name'),
            'DateBirth' => $this->request->getVar('DateBirth'),
            'ContNum' => $this->request->getVar('ContNum'),
            'ComAdd' => $this->request->getVar('ComAdd'),
            'ProfPic' => $this->request->getVar('ProfPic'),
            'EmergencyAdd' => $this->request->getVar('EmergencyAdd'),
            'EmergencyContNum' => $this->request->getVar('EmergencyContNum'),
            'RegDate'  => $this->request->getVar('RegDate'),
        ];
        $main->update($Id, $data);
        return $this->response->redirect('/list');
    }
 
    // delete name
    public function delete($Id = null){
        $main = new MainModel();
        $data['tblscdetails'] = $main->where('Id', $Id)->delete($Id);
        return $this->response->redirect(site_url('/test'));
    }    
}