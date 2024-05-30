<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\UserIdonateModel;
use App\Models\AcceptbookingModel;
use App\Models\UserbookingModel;
use App\Models\InKindModel;
use Dompdf\Dompdf;
class UserIdonateController extends BaseController
{
    private $uidm;
    private $acceptbooking;
    private $userbooking;
    private $Inkind;
    public function __construct()
    {
        $this->acceptbooking = new AcceptbookingModel();
        $this->uidm = new userIdonateModel();
        $this->userbooking = new UserbookingModel();
        $this->Inkind = new InKindModel();
    }
    //for user
    public function userIdonate()
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
                ->where('acceptbooking.status', 'Accepted')->orwhere('acceptbooking.status', 'Declined')->where('acceptbooking.usersignsId', $user )
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
        'getCount' => $this->acceptbooking->select('Count(*) as notif')->where('acceptbooking.usersignsId', $user)->first()
        ];
        return view('admin/userIdonate', $data);
    }
    public function ReceivedMonetary()
    {
        $updateID = $this->request->getVar('update');
    
        $update = $this->viewToUpdateReceivedMonetary($updateID);

            $this->updateTheInkindToReceivedMonetary($updateID);
        
        return redirect()->to('/userdonatedtable');
    }
    
    private function viewToUpdateReceivedMonetary($updateID)
    {
        $update = $this->uidm->where('id', $updateID)->first();
    
        return $update;
    }
    
    private function updateTheInkindToReceivedMonetary($updateID)
    {
        $data = [
            'status' => 'Received',
        ];
    
        $this->uidm->update($updateID, $data);
    }

    public function PosponedMonetary()
    {
        $updateID = $this->request->getVar('update');
    
        $update = $this->viewToUpdatePosponedMonetary($updateID);

            $this->updateThePosponedMonetary($updateID);
        
        return redirect()->to('/userdonatedtable');
    }
    
    private function viewToUpdatePosponedMonetary($updateID)
    {
        $update = $this->uidm->where('id', $updateID)->first();
    
        return $update;
    }
    
    private function updateThePosponedMonetary($updateID)
    {
        $data = [
            'status' => 'Postponed',
        ];
    
        $this->uidm->update($updateID, $data);
    }
      
    public function sbmtDonation()
    {
        $session = session();

        $data = [
            'usersignsId' => $this->request->getPost('usersignsId'),
            'establishment' => $this->request->getPost('establishment'),
            'lastname' => $this->request->getPost('lastname'),
            'firstname' => $this->request->getPost('firstname'),
            'middlename' => $this->request->getPost('middlename'),
            'contactnum' => $this->request->getPost('contactnum'),
            'cashDonation' => $this->request->getPost('cashDonation'),
            'cashCheck' => $this->request->getPost('cashCheck'),
            'referencenum' => $this->request->getPost('referencenum'),
            'message' => $this->request->getPost('message'),
            'status' => 'pending'
        ];
        
        $imagePath = $_SERVER['DOCUMENT_ROOT'];
        $picture = $this->request->getFile('picture');
        $imageData = $this->request->getPost('imageData');
        
        if ($picture && $picture->isValid() && !$picture->hasMoved()) {
            // Handle file upload
            $newFileName = $picture->getRandomName();
            $picture->move($imagePath . '/upload/monetary/', $newFileName);
            $data['picture'] = $newFileName;
        } 
        elseif ($imageData) {
            // Handle captured image
            $imageData = str_replace('data:image/jpeg;base64,', '', $imageData);
            $imageData = base64_decode($imageData);
            $newFileName = uniqid() . '.jpg';
            file_put_contents($imagePath . '/upload/monetary/' . $newFileName, $imageData);
            $data['picture'] = $newFileName;

            
        }
       
        $uidm = new UserIdonateModel();
        
        if (!empty($id)) {
            $uidm->update($id, $data);
        } else {
            $uidm->save($data);
        }
        
        session()->setFlashdata('success', 'The data has been saved sucessfully.');
        return redirect()->to('/donate-money');
    }

    public function deletedonation($id = null)
    {
        $this->uidm->delete($id);
        return $this->response->redirect(site_url('/userdonatedtable'));
    }

    //for admin
    public function admdonatedtable()
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
 
        $data['donate'] = $this->uidm->select('user.userID, user.Email, 
        userdonation.id, userdonation.usersignsId, userdonation.lastname, userdonation.firstname, 
        userdonation.middlename, userdonation.contactnum, userdonation.donationdate, userdonation.establishment, userdonation.cashDonation,userdonation.cashCheck, 
        userdonation.picture, userdonation.referencenum, userdonation.message,userdonation.status')
        ->join('user', 'user.userID = userdonation.usersignsId')
        ->where('userdonation.status', 'pending')
        ->findAll();
        // $data['donate'] = $this->uidm->findAll();

        return view('dashboard/userdonatedtable', $data);
    }

    public function sbmtInkindDonation()
    {
        $session = session();

        $id = $this->request->getPost('id');
        $data = [
            'usersignsId' => $this->request->getPost('usersignsId'),
            'Establishment' => $this->request->getPost('Establishment'),
            'lastname' => $this->request->getPost('lastname'),
            'firstname' => $this->request->getPost('firstname'),
            'middlename' => $this->request->getPost('middlename'),
            'contactnum' => $this->request->getPost('contactnum'),
            'inKindDonationItem' => $this->request->getPost('inKindDonationItem'),
            'donationdate' => $this->request->getPost('donationdate'),
            'message' => $this->request->getPost('message'),
            'status' => 'pending'
        ];
        
        $picture = $this->request->getFile('picture');
        $imageData = $this->request->getPost('imageData');
        $imagePath = $_SERVER['DOCUMENT_ROOT'];
        if ($picture && $picture->isValid() && !$picture->hasMoved()) {
            // Handle file upload
            $newFileName = $picture->getRandomName();
            $picture->move($imagePath . '/upload/inkind/', $newFileName);
            $data['picture'] = $newFileName;
        } 
        elseif ($imageData) {
            // Handle captured image
            $imageData = str_replace('data:image/jpeg;base64,', '', $imageData);
            $imageData = base64_decode($imageData);
            $newFileName = uniqid() . '.jpg';
            file_put_contents($imagePath . '/upload/inkind/' . $newFileName, $imageData);
            $data['picture'] = $newFileName;
            
        }
        
        if (!empty($id)) {
            $this->Inkind->update($id, $data);
        } else {
            $this->Inkind->save($data);
        }
        session()->setFlashdata('success', 'The data has been saved sucessfully.');
        return redirect()->to('/donate-items');
    }

    public function viewDonateInkind()
    {
        $user = session()->get('userID');
        $data = [ 
            'inkind' => $this->Inkind->select('inkinddonation_tbl.id, inkinddonation_tbl.usersignsId, inkinddonation_tbl.Establishment, inkinddonation_tbl.lastname,
            inkinddonation_tbl.firstname, inkinddonation_tbl.middlename, inkinddonation_tbl.contactnum,inkinddonation_tbl.inKindDonationItem, inkinddonation_tbl.donationdate,
            inkinddonation_tbl.picture,inkinddonation_tbl.message, inkinddonation_tbl.status, user.userID, user.Email')
            ->join('user', 'user.userID = inkinddonation_tbl.usersignsId')
            ->where('inkinddonation_tbl.status', 'pending')
            ->findAll(),

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
        return view('dashboard/inkind', $data);
    }

    public function dltInkinddonation($id = null)
    {
        $this->Inkind->delete($id);
        return $this->response->redirect(site_url('/tableindkind'));
    }

    public function PostponedInkind()
    {
        $updateID = $this->request->getVar('update');

        $update = $this->viewToUpdate($updateID);
        $this->updatePostponed($update);
        return redirect()->to('/tableindkind');
    }

    private function viewToUpdate($updateID)
    {
        $update = $this->Inkind->where('id', $updateID)->first();

        return $update;
    }

    private function updatePostponed($update)
    {

            $data = [
            'status' => 'Postponed',
        ];

        $this->Inkind->update($update, $data);
        
            
      }

      public function ReceivedInkind()
      {
          $updateID = $this->request->getVar('update');
  
          $update = $this->viewToUpdateReceived($updateID);
          $this->updateTheInkindToReceived($update);
          return redirect()->to('/tableindkind');
      }
  
      private function viewToUpdateReceived($updateID)
      {
          $update = $this->Inkind->where('id', $updateID)->first();
  
          return $update;
      }
  
      private function updateTheInkindToReceived($update)
      {
  
              $data = [
              'status' => 'Received',
          ];
  
          $this->Inkind->update($update, $data);
          
              
      }


      public function viewReceiveMonetary()
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
 
        $data['donate'] = $this->uidm->select('user.userID, user.Email, 
        userdonation.id, userdonation.usersignsId, userdonation.lastname, userdonation.firstname,userdonation.mumosahapag, 
        userdonation.middlename, userdonation.contactnum, userdonation.donationdate, userdonation.establishment, userdonation.cashDonation,userdonation.cashCheck, 
        userdonation.picture, userdonation.referencenum, userdonation.message,userdonation.status')
        ->join('user', 'user.userID = userdonation.usersignsId')
        ->where('userdonation.status', 'Received')
        ->findAll();

        return view('dashboard/tableMonetary', $data);

      }
      public function viewPostponedMonetary()
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
 
        $data['donate'] = $this->uidm->select('user.userID, user.Email, 
        userdonation.id, userdonation.usersignsId, userdonation.lastname, userdonation.firstname, 
        userdonation.middlename, userdonation.contactnum, userdonation.donationdate, userdonation.establishment, userdonation.cashDonation,userdonation.cashCheck, 
        userdonation.picture, userdonation.referencenum, userdonation.message,userdonation.status')
        ->join('user', 'user.userID = userdonation.usersignsId')
        ->where('userdonation.status', 'Postponed')
        ->findAll();

        return view('dashboard/tablePostponedMonetary', $data);

      }

      public function viewReceiveInkind()
    {
        $user = session()->get('userID');
        $data = [ 
            'inkind' => $this->Inkind->select('inkinddonation_tbl.id, inkinddonation_tbl.usersignsId, inkinddonation_tbl.Establishment, inkinddonation_tbl.lastname,
            inkinddonation_tbl.firstname, inkinddonation_tbl.middlename, inkinddonation_tbl.contactnum,inkinddonation_tbl.inKindDonationItem, inkinddonation_tbl.donationdate,
            inkinddonation_tbl.picture,inkinddonation_tbl.message, inkinddonation_tbl.status, user.userID, user.Email')
            ->join('user', 'user.userID = inkinddonation_tbl.usersignsId')
            ->where('inkinddonation_tbl.status', 'Received')
            ->findAll(),

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
        return view('dashboard/tablereceivedinkind', $data);
    }

    public function viewPostponedInkind()
    {
        $user = session()->get('userID');
        $data = [ 
            'inkind' => $this->Inkind->select('inkinddonation_tbl.id, inkinddonation_tbl.usersignsId, inkinddonation_tbl.Establishment, inkinddonation_tbl.lastname,
            inkinddonation_tbl.firstname, inkinddonation_tbl.middlename, inkinddonation_tbl.contactnum,inkinddonation_tbl.inKindDonationItem, inkinddonation_tbl.donationdate,
            inkinddonation_tbl.picture,inkinddonation_tbl.message, inkinddonation_tbl.status, user.userID, user.Email')
            ->join('user', 'user.userID = inkinddonation_tbl.usersignsId')
            ->where('inkinddonation_tbl.status', 'Postponed')
            ->findAll(),

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
        return view('dashboard/tablepostponedinkind', $data);
    }

    public function inKind()
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
                ->where('acceptbooking.status', 'Accepted')->orwhere('acceptbooking.status', 'Declined')->where('acceptbooking.usersignsId', $user )
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
        'getCount' => $this->acceptbooking->select('Count(*) as notif')->where('acceptbooking.usersignsId', $user)->first()
        ];

        return view('admin/InKind', $data);
    }

    public function getToeditMonetary($id)
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
                'countNotifs' => $this->userbooking->where('status', 'pending')->countAllResults(),
                'mumo' =>  $this->uidm->where('id', $id)->first()


        ];

        
        return view('dashboard/editMonetary', $data);
    }
    
    public function EditMonetary($id)
    {

        $getMonetary = $this->uidm->where('id', $id)->first();

        $changeMumo = $getMonetary['mumosahapag'] + $this->request->getPost('mumosahapag');


            
            $data = [
                'mumosahapag' => $changeMumo,
            ];

            $this->uidm->update($id, $data);

            return redirect()->to('viewReceiveMonetary');
    }


    public function viewReportMonetary()
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


        return view('dashboard/reportMonetary', $data);

    }


    public function searchMonetary()
    {

        $fromdate = $this->request->getVar('fromdate');
        $todate = $this->request->getVar('todate');

        $data = [
            'fromdate' => $fromdate,
            'todate'   => $todate, 
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
                'countNotifs' => $this->userbooking->where('status', 'pending')->countAllResults(),

                'Monetary' =>  $this->uidm->select('user.userID, user.Email, 
                userdonation.id, userdonation.usersignsId, userdonation.lastname, userdonation.firstname, userdonation.mumosahapag, 
                userdonation.middlename, userdonation.contactnum, userdonation.donationdate, userdonation.establishment, userdonation.cashDonation,userdonation.cashCheck, 
                userdonation.picture, userdonation.referencenum, userdonation.message,userdonation.status')
                ->join('user', 'user.userID = userdonation.usersignsId')->where('DATE(donationdate) >=', $fromdate)
                                         ->where('DATE(donationdate) <=', $todate)
                                         ->findAll(),
        ];

        return view('dashboard/searchMonetary', $data);


    }

   
}
