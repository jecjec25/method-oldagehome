<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\UserbookingModel;
use App\Models\AcceptbookingModel;
use App\Models\BookingModel;
use App\Models\MainModel;
use CodeIgniter\RESTful\ResourceController;

class UserbookingController extends ResourceController
{
    private $userbooking;
    private $acceptbooking;
    private $booking;
    private $main;
    public function __construct()
    {
        $this->userbooking = new UserbookingModel();
        $this->acceptbooking = new AcceptbookingModel();
        $this->booking = new BookingModel();
        $this->main = new MainModel();
    }


    public function getDisabled()
    {
     $data['disableDates'] = $this->acceptbooking->getDisabledDates();


    }
    public function index()
    {

        $data = $this->acceptbooking->getBookingsByTimeRange();



        return $this->respond($data);
    }

    public function index1()
    {

        $data = $this->userbooking->getBookingsByMonth();



        return $this->respond($data);
    }

    public function index2()
    {
        // Fetch data from the model
        $data = $this->main->where('scstatus', 'Unarchive')->getGenderDistribution();

        // Return the data as JSON
        return $this->respond($data);
    }

    public function getNotifAccept($id)
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
        $data['even'] = $this->userbooking->where('bookingId', $id)->first();
    
        // Add a check for null value
        if (is_null($data['even'])) {
            // Handle the case where no record is found
            $data['even'] = [];
        }
    
        return view('dashboard/getNotif/forEvent', $data);
    }
    
    public function bookinge()
    {       $data = [
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
            'Time' => $this->request->getPost('Time'),
            'equipment' => $this->request->getPost('equipment'),
            'comments' => $this->request->getPost('comments'),
            'status' => 'pending'
        ];

        $userbooking = new UserbookingModel();

        if (!empty($Id)) {
            $userbooking->update($Id, $data);
        } else {
            $userbooking->save($data);
        }
        session()->setFlashdata('success', 'The data has been saved sucessfully.');
        return redirect()->to('/booking');
    }
public function bookchecked()
{
    $user = session()->get('userID');

    // Fetch the accepted bookings for the user
    $bookings = $this->acceptbooking
        ->select('acceptbooking.id, acceptbooking.lastname, acceptbooking.firstname, 
                  acceptbooking.middlename, acceptbooking.contactnum, acceptbooking.event, 
                  acceptbooking.Time, acceptbooking.prefferdate, acceptbooking.equipment, 
                  acceptbooking.comments, acceptbooking.status, acceptbooking.usersignsId, 
                  user.userID, user.LastName, user.FirstName')
        ->join('user', 'user.userID = acceptbooking.usersignsId')
        ->where('acceptbooking.status', 'Accepted')
        ->findAll();

    // Prepare disableDates array
    $disableDates = [];
    foreach ($bookings as $booking) {
        $date = $booking['prefferdate'];
        $time = $booking['Time'];
        if (!isset($disableDates[$date])) {
            $disableDates[$date] = [];
        }
        $disableDates[$date][] = $time;
    }

    // Debugging output
    error_log(print_r($disableDates, true));

    $data = [
        'notif' => $bookings,
        'notifs' => $this->acceptbooking
            ->select('acceptbooking.id, acceptbooking.lastname, acceptbooking.firstname, 
                      acceptbooking.middlename, acceptbooking.contactnum, acceptbooking.event, 
                      acceptbooking.Time, acceptbooking.prefferdate, acceptbooking.equipment, 
                      acceptbooking.comments, acceptbooking.status, acceptbooking.usersignsId, 
                      user.userID, user.LastName, user.FirstName')
            ->join('user', 'user.userID = acceptbooking.usersignsId')
            ->where('acceptbooking.status', 'Accepted')
            ->where('acceptbooking.usersignsId', $user)
            ->first(),
        'getCount' => $this->acceptbooking->select('Count(*) as notif')->where('acceptbooking.status', 'Accepted')
            ->where('acceptbooking.usersignsId', $user)->first(),
        'disableDates' => $disableDates,
        'book' => $bookings
    ];

    // Debugging output
    error_log(print_r($data, true));

    return view('admin/userbooking', $data);
}

    public function bookingAD()
    {       $data = [
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
 
        $data['calen'] = $this->booking->where('status', 'Accepted')->findAll();

        return view('dashboard/bookings', $data);
    }

    public function deleteAcceptedEvent($Id)
    {
        $acceptbooking = new AcceptbookingModel();
        $acceptbooking->delete($Id);

        return redirect()->to('ADbooking');
    }
    
    public function bookingD()
    {       $data = [
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
 
        $data['calen'] = $this->booking->where('status', 'Declined')->findAll();

        return view('dashboard/bookingDec', $data);
    }

    public function deleteDeclinedEvent($Id)
    {
        $acceptbooking = new AcceptbookingModel();
        $acceptbooking->delete($Id);
        return redirect()->to('Dbooking');
    }
}
