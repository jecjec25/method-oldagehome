<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\UserbookingModel;
use App\Models\BookingModel;
class Fullcalendar extends BaseController
{

    private $booking;
    private $book;
    public function __construct()
    {
        $this->booking = new UserbookingModel();
        $this->book = new BookingModel();
        helper(['form']); 
    }


    public function Accept()
    {

       
        $accept  = $this->request->getVar('accept');
        if(empty($accept))
        {
            return redirect()->to('canlendar')->with('msg', 'No Data to Insert');
        }
        $acceptMe = $this->getBook($accept);
                    $this->acceptBooking($acceptMe);
                    $this->removePending($accept);
            return redirect()->to('calendar')->with('msg', '');
    }


    private function getBook($accept)
    {
        $acceptMe = $this->booking->where('bookingId', $accept)->get()->getResultArray();

        return $acceptMe;
    }



    private function acceptBooking($acceptMe)
    {

        if (empty($acceptMe)) {
            return redirect()->to('canlendar')->with('msg', 'No Data to Insert');
        }
    
        $acceptBookings = [];


        foreach($acceptMe as $a)
        {
            $acceptBookings[] = [
            'usersignsId' => $a['usersignsId'],
            'lastname' => $a['lastname'],
            'firstname' => $a['firstname'],
            'middlename' => $a['middlename'],
            'contactnum' => $a['contactnum'],
            'event' => $a['event'],
            'prefferdate' => $a['prefferdate'],
            'alterdate' => $a['alterdate'],
            'equipment' => $a['equipment'],
            'comments' => $a['comments'],
            'status' => 'Accepted'
            ];
        }
        
        $this->book->InsertBatch($acceptBookings);
    } 


    private function removePending($accept)
    {
        $this->booking->where('bookingId', $accept)->delete();
    }

    public function Decline()
    {

       
        $decline  = $this->request->getVar('decline');
        if(empty($decline))
        {
            return redirect()->to('canlendar')->with('msg', 'No Data to Insert');
        }
        $declineMe = $this->declineBook($decline);
                    $this->declineBooking($declineMe);
                    $this->removedeclinePending($decline);
            return redirect()->to('calendar');
    }
    private function declineBook($decline)
    {
        $acceptMe = $this->booking->where('bookingId', $decline)->get()->getResultArray();

        return $acceptMe;
    }


    private function declineBooking($declineMe)
    {

        if (empty($declineMe)) {
            return redirect()->to('canlendar')->with('msg', 'No Data to Insert');
        }
    
        $declineBookings = [];


        foreach($declineMe as $a)
        {
            $declineBookings[] = [
            'usersignsId' => $a['usersignsId'],
            'lastname' => $a['lastname'],
            'firstname' => $a['firstname'],
            'middlename' => $a['middlename'],
            'contactnum' => $a['contactnum'],
            'event' => $a['event'],
            'prefferdate' => $a['prefferdate'],
            'alterdate' => $a['alterdate'],
            'equipment' => $a['equipment'],
            'comments' => $a['comments'],
            'status' => 'Declined'
            ];
        }
        
        $this->book->InsertBatch($declineBookings);
    }
    private function removedeclinePending($decline)
    {
        $this->booking->where('bookingId', $decline)->delete();
    } 
}
