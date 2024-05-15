<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ElderneedModel;
use App\Models\UserbookingModel;
class ElderneedController extends BaseController
{
    private $elneed;
    private $userbooking;
    public function __construct()
    {
        $this->userbooking = new UserbookingModel();
        $this->elneed = new ElderneedModel();
    }

    public function viewelderneed()
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
 
        return view('dashboard/elderneed', $data);
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
 
        $data['eneed'] = $this->elneed->findAll();
        return view ('dashboard/manageneed', $data);
    }
    
    public function viewToupdate($id)
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
             'viewneed'  => $this->elneed->where('id', $id)->first(),
            'countNotifs' => $this->userbooking->where('status', 'pending')->countAllResults()
        ];
 
        return view('dashboard/editelderneed', $data);
    }
    public function editelderneed($id)
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
