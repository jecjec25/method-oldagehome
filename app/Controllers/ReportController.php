<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\UserbookingModel;
use App\Models\ReportdonationModel;
use App\Models\BookingModel;

class ReportController extends BaseController
{
    private $eventsModel;
    private $donationsModel;
    private $booking;

    public function __construct()
    {
        $this->eventsModel = new UserbookingModel();
        $this->donationsModel = new ReportdonationModel();
        $this->booking = new BookingModel();

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
   {
    return view('dashboard/donationreport');
   }

   //donation report controller

   public function viewdonrep()
    {
        $dnreport = new ReportdonationModel();
        $data['main'] = $dnreport->findAll();
        return view('dashboard/managedonrep', $data);
    }
}