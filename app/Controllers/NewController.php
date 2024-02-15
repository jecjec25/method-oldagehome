<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\MainModel;
use App\Models\ProductsModel;
use App\Models\UserModel;
use App\Controllers\ViewController;
class NewController extends BaseController
{
    public function test()
    {
        $main = new MainModel();
        $data['main'] = $main->findAll();
        return view ('dashboard/managescdetails', $data);
    }
    public function save()
    {
        $Id = $this->request->getPost('Id');
        $data = [
            'Name' => $this->request->getPost('Name'),
            'DateBirth' => $this->request->getPost('DateBirth'),
            'ContNum' => $this->request->getPost('ContNum'),
            'ComAdd' => $this->request->getPost('ComAdd'),
            'ProfPic' => $this->request->getPost('ProfPic'),
            'EmergencyAdd' => $this->request->getPost('EmergencyAdd'),
            'EmergencyContNum' => $this->request->getPost('EmergencyContNum'),
            'RegDate' => $this->request->getPost('RegDate'),
        ];
        
        $main = new MainModel();

        if (!empty($Id)){
            $main->update($Id, $data);
        }
        else 
        {
            $main->save($data);
        }
        return redirect()->to('/test');
    }
    public function edit($Id)
    {
         // Fetch the user data from the database
    $main = $this->MainModel->find($Id);

    // Check if the user exists
    if ($main) {
        // Load the edit view and pass the user data
        return view('edit', ['user' => $main]);
    } else {
        // User not found
        throw new \CodeIgniter\Exceptions\PageNotFoundException('User not found');
    }
    }
    public function delete($Id = null)
    {

     $main = new MainModel();

     $data['main'] = $main->where('Id', $Id)->delete();

     return redirect()->to( base_url('save') );
    }
    public function update($Id)
    {
        $main = new MainModel();

        $data = [
            'Name' => $this->request->getPost('Name'),
            'DateBirth' => $this->request->getPost('DateBirth'),
            'ContNum' => $this->request->getPost('ContNum'),
            'ComAdd' => $this->request->getPost('ComAdd'),
            'ProfPic' => $this->request->getPost('ProfPic'),
            'EmergencyAdd' => $this->request->getPost('EmergencyAdd'),
            'EmergencyContNum' => $this->request->getPost('EmergencyContNum'),
            'RegDate' => $this->request->getPost('RegDate'),
        ];

        $main->update($Id, $data);

        return redirect()->to('/test')->with('success', 'Senior Citizen details updated successfully');
    }
    // public function updatess()
    // {
    //     $data =[
    //         'Name' => $this->request->getPost('Name'),
    //         'DateBirth' => $this->request->getPost('DateBirth'),
    //         'ContNum' => $this->request->getPost('ContNum'),
    //         'ComAdd' => $this->request->getPost('ComAdd'),
    //         'ProfPic' => $this->request->getPost('ProfPic'),
    //         'EmergencyAdd' => $this->request->getPost('EmergencyAdd'),
    //         'EmergencyContNum' => $this->request->getPost('EmergencyContNum'),
    //         'RegDate' => $this->request->getPost('RegDate'),
    //     ];
    //     $main = new MainModel();
    //     $main->set($data)->where($data)->update();
    //     return redirect()->to('/test');
    // }
    public function submit(){
        $main = new MainModel();
        $data['main'] = $main->findAll();
        return view ('/test', $data);
    }
    // public function editss($Id = null)
    // {
    //     $main = new MainModel();
    //     $data['main'] = $main->find($Id);
    //     return view('/test', $data);
    // }
    public function show(){
        $product = new ProductsModel();
        $data['product'] = $product->findAll();
        return view ('dashboard/manageproduct', $data);
    }
    public function saved(){
        $Id = $this->request->getPost('Id');
        $data = [
            'ProdName' => $this->request->getPost('ProdName'),
            'Quantity' => $this->request->getPost('Quantity'),
            'ProdPrice' => $this->request->getPost('ProdPrice'),
            'ProdDescription' => $this->request->getPost('ProdDescription'),
            'ProdPic' => $this->request->getPost('ProdPic'),
        ];
        
        $product= new ProductsModel();

        if (!empty($Id)){
            $product->update($Id, $data);
        }
        else 
        {
            $product->save($data);
        }
        return redirect()->to('/show');
    }
}