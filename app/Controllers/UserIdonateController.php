<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\UserIdonateModel;
use App\Models\AcceptbookingModel;
use App\Models\UserbookingModel;

class UserIdonateController extends BaseController
{
    private $uidm;
    private $acceptbooking;
    private $userbooking;

    public function __construct()
    {
        $this->acceptbooking = new AcceptbookingModel();
        $this->uidm = new userIdonateModel();
        $this->userbooking = new UserbookingModel();
    }
    //for user
    public function userIdonate()
    {
        $user = session()->get('userID');
        $data = [
            'notif' => $this->acceptbooking
                ->select('acceptbooking.id, acceptbooking.lastname, acceptbooking.firstname, 
                acceptbooking.middlename, acceptbooking.contactnum, acceptbooking.event, 
                acceptbooking.time, acceptbooking.prefferdate, acceptbooking.equipment, 
                acceptbooking.comments, acceptbooking.status, acceptbooking.usersignsId, 
                user.userID, user.LastName, user.FirstName')
                ->join('user', 'user.userID = acceptbooking.usersignsId')
                ->where('acceptbooking.status', 'Accepted')->orwhere('acceptbooking.status', 'Declined')->where('acceptbooking.usersignsId', $user )
                ->findAll(),
                
        'notifs' => $this->acceptbooking
            ->select('acceptbooking.id, acceptbooking.lastname, acceptbooking.firstname, 
            acceptbooking.middlename, acceptbooking.contactnum, acceptbooking.event, 
            acceptbooking.time, acceptbooking.prefferdate, acceptbooking.equipment, 
            acceptbooking.comments, acceptbooking.status, acceptbooking.usersignsId, 
            user.userID, user.LastName, user.FirstName')
            ->join('user', 'user.userID = acceptbooking.usersignsId')
            ->where('acceptbooking.status', 'Accepted')->where('acceptbooking.usersignsId', $user )
            ->first(),
        'getCount' => $this->acceptbooking->select('Count(*) as notif')->where('acceptbooking.usersignsId', $user)->first()
        ];
        return view('admin/userIdonate', $data);
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
        $data = [
            'notif' => $this->userbooking->where('status', 'pending')->first(),
            'getnotif' => $this->userbooking
                ->select('userbooking.bookingId, userbooking.lastname, userbooking.firstname, 
                    userbooking.middlename, userbooking.contactnum, userbooking.event, 
                    userbooking.time, userbooking.prefferdate, userbooking.equipment, 
                    userbooking.comments, userbooking.status, userbooking.usersignsId, 
                    user.userID, user.LastName, user.FirstName')
                ->join('user', 'user.userID = userbooking.usersignsId')
                ->where('userbooking.status', 'Accepted')
                ->orWhere('userbooking.status', 'Pending')
                ->findAll(),
            'countNotifs' => $this->userbooking->where('status', 'pending')->countAllResults()
        ];
 
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
