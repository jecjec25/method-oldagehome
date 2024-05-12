<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\UserIdonateModel;
class UserIdonateController extends BaseController
{
    private $uidm;

    public function __construct()
    {
        $this->uidm = new userIdonateModel();
    }
    //for user
    public function userIdonate()
    {
        return view('admin/userIdonate');
    }
    
    public function sbmtDonation()
    {
        $session = session();

        $id = $this->request->getPost('id');
        $data = [
            'usersignsId' => $this->request->getPost('usersignsId'),
            'lastname' => $this->request->getPost('lastname'),
            'firstname' => $this->request->getPost('firstname'),
            'middlename' => $this->request->getPost('middlename'),
            'contactnum' => $this->request->getPost('contactnum'),
            'donationdate' => $this->request->getPost('donationdate'),
            'nameofdonation' => $this->request->getPost('nameofdonation'),
            'picture' => $this->request->getPost('picture'),
            'referencenum' => $this->request->getPost('referencenum'),
            'message' => $this->request->getPost('message'),
        ];

        $uidm = new UserIdonateModel();

        if (!empty($id)) {
            $uidm->update($id, $data);
        } else {
            $uidm->save($data);
        }
        session()->setFlashdata('success', 'The data has been saved sucessfully.');
        return redirect()->to('/userIdonate');
    }

    public function deletedonation($id = null)
    {
        $this->uidm->delete($id);
        return $this->response->redirect(site_url('/userdonatedtable'));
    }

    //for admin
    public function admdonatedtable()
    {
        $data['donate'] = $this->uidm->select('user.userID, user.Email, 
        userdonation.id, userdonation.usersignsId, userdonation.lastname, userdonation.firstname, 
        userdonation.middlename, userdonation.contactnum, userdonation.donationdate, userdonation.nameofdonation, 
        userdonation.picture, userdonation.referencenum, userdonation.message')
        ->join('user', 'user.userID = userdonation.usersignsId')
        ->findAll();
        // $data['donate'] = $this->uidm->findAll();

        return view('dashboard/userdonatedtable', $data);
    }

}
