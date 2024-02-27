<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\UserbookingModel;
use App\Models\BookingModel;
class UserbookingController extends BaseController
{
    private $userbooking;
    private $booking;
    public function __construct()
    {
        $this->userbooking = new UserbookingModel();
        $this->booking = new BookingModel();
    }
    public function bookinge()
    {
        $userbooking = new UserbookingModel();
        $data['calen'] = $userbooking->findAll();
        return view('dashboard/fullcalendar', $data);
    }
    public function checkbook()
    {
        $session = session();

        $Id = $this->request->getPost('bookingId');
        $data = [
            'usersignsId' => $this->request->getPost('usersignsId'), 
            'lastname' => $this->request->getPost('lastname'),
            'firstname' => $this->request->getPost('firstname'),
            'middlename' => $this->request->getPost('middlename'),
            'contactnum' => $this->request->getPost('contactnum'),
            'event' => $this->request->getPost('event'),
            'prefferdate' => $this->request->getPost('prefferdate'),
            'alterdate' => $this->request->getPost('alterdate'),
            'equipment' => $this->request->getPost('equipment'),
            'comments' => $this->request->getPost('comments'),
            'status' => 'pending'
        ];
        
        $userbooking = new UserbookingModel();

        if (!empty($Id)){
            $userbooking->update($Id, $data);
        }
        else 
        {
            $userbooking->save($data);
        }
        session()->setFlashdata('success', 'The data has been saved sucessfully.');
        return redirect()->to('/booking');
    } 
    public function bookchecked(){
        $userbooking = new UserbookingModel();
        $data['book'] = $userbooking->findAll();
        return view ('admin/userbooking', $data);
    }
}
