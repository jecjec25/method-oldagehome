<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\MainModel;
class ViewController extends BaseController
{
    public function home()
    {
        return view('admin/home');
    }
    public function contact()
    {
        return view('admin/contact');
    }
    public function eligability()
    {
        return view('admin/eligibility');
    }
    public function about()
    {
        return view('admin/about');
    }
    public function rules()
    {
        return view('admin/rules');
    }
    public function service()
    {
        return view('admin/service');
    }
    public function searchs()
    {
        return view('admin/searchs');
    }
    public function products()
    {
        return view('admin/products');
    }
    public function dash()
    {
        return view('dashboard/dash');
    }
    public function search()
    {
        return view('dashboard/search');
    }
    public function rule()
    {
        return view('dashboard/rule');
    }
    public function eligibility()
    {
        return view('dashboard/eligibility');
    }
    public function aboutus()
    {
        return view('dashboard/aboutus');
    }
    public function contactus()
    {
        return view('dashboard/contactus');
    }
    public function reports()
    {
        return view('dashboard/reports');
    }
    public function addservices()
    {
        return view('dashboard/addservices');
    }
    public function manageservices()
    {
        return view('dashboard/manageservices');
    }
    public function managescdetails()
    {
        return view('dashboard/managescdetails');
    }
    public function unreadq()
    {
        return view('dashboard/unreadq');
    }
    public function readenq()
    {
        return view('dashboard/readenq');
    }
    public function manageproduct()
    {
        return view('dashboard/manageproduct');
    }
    public function addproduct()
    {
        return view('dashboard/addproduct');
    }
    public function editscdetails()
    {
        return view('dashboard/editscdetails');
    }
    public function editproduct()
    {
        $main = new MainModel();
        $data['tblscdetails'] = $main->findAll();
        return view('dashboard/editproduct', $data);
    }
    //UserForm
    public function adddetails()
    {
        return view('dashboard/adddetails');
    }
    //UserList
    public function details(){
        $main = new MainModel();
        $data['tblscdetails'] = $main->orderBy('Id', 'DESC')->findAll();
        return view('dashboard/managescdetails', $data);
    }
    //Insert Data
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
            'AddedBy' => $this->request->getVar('AddedBy'),
            'RegDate'  => $this->request->getVar('RegDate'),
        ];
        $main->insert($data);
        return $this->response->redirect(site_url('/details'));
    }
    public function Edit($Id = null){
        $main = new MainModel();
        $data[''] = $main->where('Id', $Id)->first();
        return view('dashboard/editscdetails', $data);
    }
     // update user data
     public function update(){
        $main = new MainModel();
        $Id = $this->request->getVar('Id');
        $data = [
            'RegNum' => $this->request->getVar('RegNum'),
            'Name' => $this->request->getVar('Name'),
            'DateBirth' => $this->request->getVar('DateBirth'),
            'ContNum' => $this->request->getVar('ContNum'),
            'ComAdd' => $this->request->getVar('ComAdd'),
            'ProfPic' => $this->request->getVar('ProfPic'),
            'EmergencyAdd' => $this->request->getVar('EmergencyAdd'),
            'EmergencyContNum' => $this->request->getVar('EmergencyContNum'),
            'AddedBy' => $this->request->getVar('AddedBy'),
            'RegDate'  => $this->request->getVar('RegDate'),
        ];
        $main->update($Id, $data);
        return $this->response->redirect(site_url('/users-list'));
    }
  
    // delete user
    public function delete($Id = null){
        $main = new MainModel();
        $data['user'] = $main->where('Id', $Id)->delete($Id);
        return $this->response->redirect(site_url('/users-list'));
    }    
}
