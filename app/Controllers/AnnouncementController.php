<?php

namespace App\Controllers;
use App\Models\AnnouncementModel;

use App\Controllers\BaseController;

class AnnouncementController extends BaseController
{
    private $admannouncement;

    public function __construct()
    {
        $this->admannouncement = new AnnouncementModel();
        helper(['form']);
    }

    public function Adannnouncement()
    {
        return view('dashboard/Adannouncement');
    }

    public function saveAnnouncement()
    {

        $rules = [
            'Title'   => 'required|min_length[5]',
            'Content'   => 'required|min_length[10]',
            'Author'  => 'required|min_length[5]',
            'Priority'  => 'required|min_length[5]',
            
        ];

        $image = $this->request->getFile('Attachments');
        if($this->validate($rules))
        {

        if ($image && $image->isValid() && !$image->hasMoved()) 
        {
            $myImage = $image->getRandomName();

            $image->move(WRITEPATH . 'uploads', $myImage);
    
            $data = [
                'Attachments' => $image,
                'Attachments' => 'uploads/' . $myImage,
                'Title' => $this->request->getVar('Title'),
                'Content' => $this->request->getVar('Content'),
                'Author' => $this->request->getVar('Author'),
                'Start_date' => $this->request->getVar('Start_date'),
                'End_date' => $this->request->getVar('End_date'),
                'Priority' => $this->request->getVar('Priority'),   
                'Status' => 'Draft',
            ];

            $categories = $this->request->getVar('Category');
            if (!empty($categories)) {
                $data['Category'] = implode(', ', $categories);
            }

            $tAudience = $this->request->getVar('Target_audience');
            if (!empty($tAudience)) {
                $data['Target_audience'] = implode(', ', $tAudience);
            }
    
            $this->admannouncement->save($data);
    
            return redirect()->to('/Adannouncement')->with('success', 'Data has been Uploaded');
        }
        else
        {
            return redirect()->to('/newsAndEvents')->with('error', 'Error uploading image.');
        }
    }
    else{
        $data['validation'] = $this->validator;
        echo'Invalid, try again.';
    }
    }

    public function viewannounce()
        {
            $mannounce = new AnnouncementModel();
            $data['main'] = $mannounce->where('status', 'Draft')->findAll();
            return view('dashboard/manageAnnouncement', $data);
        }
    
    public function updateannouncement($id)
    {
        $data['main'] = $this->admannouncement->where('AnnounceID', $id)->first();
        return view('dashboard/editannounce', $data);
    }
    public function EditAnnounce($id)
    {

        $data = [
            'Title' => $this->request->getVar('Title'),
            'Content' => $this->request->getVar('Content'),
            'Author' => $this->request->getVar('Author'),
            'Date_modified' => $this->request->getVar('Date_modified'),
            'Start_date' => $this->request->getVar('Start_date'),
            'End_date' => $this->request->getVar('End_date'),
            'Priority' => $this->request->getVar('Priority'),
            'Attachments' => $this->request->getVar('Attachments'),
            'Status'   => $this->request->getVar('Status'),
        ];

        $categories = $this->request->getVar('Category');
        if (!empty($categories)) {
            $data['Category'] = implode(', ', $categories);
        }

        $tAudience = $this->request->getVar('Target_audience');
        if (!empty($tAudience)) {
            $data['Target_audience'] = implode(', ', $tAudience);
        }

        $this->admannouncement->update($id, $data);

        return redirect()->to('/updateannounce')->with('success', 'Senior Citizen details updated successfully');

    }





}
