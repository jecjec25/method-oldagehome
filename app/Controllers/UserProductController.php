<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\AcceptbookingModel;
use App\Models\ProdImgModel;
use App\Models\Product;

class UserProductController extends BaseController
{
    private $acceptbooking;
    private $prodImg;
    private $product;

    public function __construct()
    {
        $this->acceptbooking = new AcceptbookingModel();
        $this->prodImg = new ProdImgModel();
        $this->product = new Product();
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
    
        'prodimg' => $this->product->findAll(),
        ];
        return view('admin/userseeproduct', $data);
    }
}
