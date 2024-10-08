<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\AcceptbookingModel;
use App\Models\ProdImgModel;

class UserProductController extends BaseController
{
    private $acceptbooking;
    private $prodImg;

    public function __construct()
    {
        $this->acceptbooking = new AcceptbookingModel();
        $this->prodImg = new ProdImgModel();
    }
    public function userproduct()
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
            ->where('acceptbooking.usersignsId', $user )
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
    
        'prodimg' => $this->prodImg->where('type', 'prod')->findAll(),
        ];
        return view('admin/userseeproduct', $data);
    }
}
