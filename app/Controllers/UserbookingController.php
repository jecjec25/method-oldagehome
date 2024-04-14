<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\UserbookingModel;
use App\Models\BookingModel;
use App\Models\EventsModel;
class UserbookingController extends BaseController
{
    private $userbooking;
    private $booking;
    private $admevent;
    public function __construct()
    {
        $this->admevent = new EventsModel();
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
        // $data['book'] = $userbooking->findAll();
        // $data['reservedDates'] = $this->getReservationDates() ;
        // // var_dump($data);
        return view ('admin/userbooking');
    }

    private function getReservationDates()
    {
        $data = $this->userbooking->select('prefferdate')->findAll();
        $formatedDates = [];

        foreach($data as $reservation)
        {
            $formatedDates [] =  date('Y-m-d', strtotime($reservation['prefferdate']));
        }

        return $formatedDates;

    }

    public function bookingAD()
    {   
        $data['calen'] = $this->booking->where('status', 'Accepted')->findAll();

        return view('dashboard/bookings', $data);
    }
    public function bookingD()
    {
        $data['calen'] = $this->booking->where('status', 'Declined')->findAll();

        return view('dashboard/bookingDec', $data);
    }

    public function reserveEventDate()
    {
        $startDate = $this->request->getPost('prefferdate');
        $endDate = $this->request->getPost('alterdate');


        // Check if the selected dates are available
        $isAvailable = $this->booking->isAvailable($startDate, $endDate);

        // return json_encode(['available' => $isAvailable]);

        if(!$isAvailable)
        {
            echo'1';
        }
        else
        {
            echo '2';
        }
    }

}
