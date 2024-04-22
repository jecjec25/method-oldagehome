<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\UserbookingModel;
use App\Models\BookingModel;
use App\Models\MainModel;
class Fullcalendar extends BaseController
{

    private $booking;
    private $book;
    private $main;
    public function __construct()
    {
        $this->booking = new UserbookingModel();
        $this->book = new BookingModel();
        $this->main = new MainModel();
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

    public function try()
    {
     
            $data = [
                'reg' => $this->main->findALl(),
                   ];
       
        return view('dashboard/reports',$data);

    }

    public function searchRes()
    {$searchRes = $this->request->getVar('regdate');
        $search = $this->request->getVar('todate');
        
        // Assuming $this->main is an instance of your model
        $data = [
            'booking' => $this->main->findAll(), // Fetching all data from the model
            'reg' => $this->main->where('RegDate <=', $searchRes)
                                 ->where('RegDate >=', $search)
                                 ->where('scstatus', 'Unarchive')
                                 ->findAll() // Fetching data where RegistrationDate falls between $searchRes and $search
        ];
        
        if (!empty($query)) {
            $data['reg'] = $query;
        } else {
            // No data found, handle this situation here
            // For example, you can set a message to display in the view
                $data['no_data_message'] = 'No data found.';
        }
        
        return view('dashboard/reportstable', $data);

        
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
            'Time' => $a['Time'],
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
            'Time' => $a['Time'],
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
    public function Archive()
    {
        $contacts = $this->request->getVar('update');

        $update = $this->scDetails($contacts);
                        $this->updateMyVisibility($update);
        return redirect()->to('/reports');
    }

    private function scDetails($contacts)
    {
        $update = $this->main->where('Id', $contacts)->first();

        return $update;

        
    }

    private function updateMyVisibility($update)
    {
        $data = [
            'scstatus' => 'Archive',
        ];

        $this->main->update($update, $data);
        
    }

}
