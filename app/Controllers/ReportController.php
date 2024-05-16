<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\UserbookingModel;
use App\Models\ReportdonationModel;
use App\Models\BookingModel;
use App\Models\MainModel;

class ReportController extends BaseController
{
    private $userbooking;
    private $eventsModel;
    private $donationsModel;
    private $booking;
    private $main;

    public function __construct()
    {
        $this->userbooking = new UserbookingModel();
        $this->eventsModel = new UserbookingModel();
        $this->donationsModel = new ReportdonationModel();
        $this->booking = new BookingModel();
        $this->main = new MainModel();

    }

    public function eventupdate($id) {
        $data = [
        
            'description' => $this->request->getVar('description'),
            'amount_raised' => $this->request->getVar('amount_raised'),
            'outcomes' => $this->request->getVar('outcomes'),
            'acknowledgement' => $this->request->getVar('acknowledgement'),
        ];
        $this->booking->update($id,$data);
        return redirect()->to('ADbooking');
    }

    public function ViewReports($id)
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
 

        $main = new UserbookingModel();
       
        $data['reports'] = $this->booking->where('id', $id)->first($id);

        // var_dump($data);
        return view('dashboard/viewBooking', $data);
    }

    public function donationreportadd() {

        $data = [

        
            'date' => $this->request->getVar('date'),
            'donor_name' => $this->request->getVar('donor_name'),
            'donation_type' => $this->request->getVar('donation_type'),
            'amount' => $this->request->getVar('amount'),
            'project_supported' => $this->request->getVar('project_supported'),
        ];
        $this->donationsModel->save($data);
        return $this->response->redirect(site_url('viewDonation'));
    }
   public function donation()
   {        $data = [
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
 
    return view('dashboard/donationreport', $data);
   }

   //donation report controller

   public function viewdonrep()
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
 

        $dnreport = new ReportdonationModel();
        $data['main'] = $dnreport->findAll();
        return view('dashboard/managedonrep', $data);
    }

    public function delete($donation_id = null)
    {
        $dreport = new ReportdonationModel();
        $data = $dreport->where('donation_id', $donation_id)->delete($donation_id);
        return $this->response->redirect(site_url('/viewDonation'));
    }


    public function eldersreps($id)
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
 
        $data['report'] = $this->main->where('Id', $id)->first();
        
        return view('dashboard/elderprint', $data);
    }
}
