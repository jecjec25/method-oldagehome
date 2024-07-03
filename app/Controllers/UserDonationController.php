<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\AcceptbookingModel;
use App\Models\ReportdonationModel;
use CodeIgniter\API\ResponseTrait;
use App\Models\DonationModel;


class UserDonationController extends BaseController
{
    use ResponseTrait;
    private $acceptbooking;
    private $donation;
    public function __construct()
    {
        $this->donation  = new DonationModel();
        $this->acceptbooking = new AcceptbookingModel();
    }

    public function getDonations()
    {
        $model = new ReportdonationModel();
        $donations = $model->findAll();
        
        return $this->respond($donations);
    }

    public function index()
    {
        return view('donations_chart');
    }

    public function userdonation()
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
        'getCount' => $this->acceptbooking->select('Count(*) as notif')->where('acceptbooking.usersignsId', $user)->first(),
        'donation' =>  $this->donation->findAll()
        ];
        return view('admin/userdonationsite', $data);
    }
}
