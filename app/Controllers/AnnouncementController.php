<?php

namespace App\Controllers;
use App\Models\AnnouncementModel;

use App\Controllers\BaseController;
use App\Models\FeedbackModel;
use Mpdf\Mpdf;

class AnnouncementController extends BaseController
{
    private $admannouncement;
    private $Feedback;

    public function __construct()
    {
        $this->Feedback = new FeedbackModel();
        $this->admannouncement = new AnnouncementModel();
        helper(['form']);
        helper('time');
    }

    public function Adannnouncement()
    {
        return view('dashboard/Adannouncement');
    }
    public function pdf()
    {
        helper('File');
        $mpdf = new Mpdf();

        $mpdf->WriteHTML('Hello World');
        return redirect()->to($mpdf->Output('filename.pdf', 'I'));

        
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
                'adminId' => $this->request->getVar('adminId'),
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
        date_default_timezone_set('UTC');
        $currentTimestamp = date('Y-m-d H:i:s');
        $data = [
            'Title' => $this->request->getVar('Title'),
            'Content' => $this->request->getVar('Content'),
            'Author' => $this->request->getVar('Author'),
            'Date_modified' =>  $currentTimestamp,
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

    public function publishedann()
    {
        $data['announce'] = $this->admannouncement->where('Status', 'published')->findAll();
        return view('dashboard/publishedannounce', $data);
    }

    public function announceArchived()
    {
       $data['announce']= $this->admannouncement->where('Status','Archive')->findAll();
        return view('dashboard/announceArchive', $data);
    }

    public function AnnouncePubArc()//main arch
    {
        $announce = $this->request->getVar('updateann');

        $updateAnn = $this->AnnouncePublishedArch($announce);
                        $this->updateMyAnnPublished($updateAnn);
        return redirect()->to('/updateannounce');
    }

    private function AnnouncePublishedArch($announce)
    {
        $updateAnn = $this->admannouncement->where('AnnounceID', $announce)->first();
        return $updateAnn;
    }

    private function updateMyAnnPublished($updateAnn)
    {
        $data = [
            'Status' => 'Archive',
        ];
        $this->admannouncement->update($updateAnn, $data);
    }

    public function AnnouncePubArch()//published
    {
        $announces = $this->request->getVar('updateAnn');

        $updateAnno = $this->AnnouncePublishedArchs($announces);
                        $this->updateMyAnnPublisheds($updateAnno);
        return redirect()->to('/publishedannounce');
    }

    private function AnnouncePublishedArchs($announces)
    {
        $updateAnno = $this->admannouncement->where('AnnounceID', $announces)->first();
        return $updateAnno;
    }

    private function updateMyAnnPublisheds($updateAnno)
    {
        $data = [
            'Status' => 'Archive',
        ];
        $this->admannouncement->update($updateAnno, $data);
    }

    public function searchannouncement()
    {
        $searchannounce = $this->request->getVar('searchannounce');
        if($searchannounce)
        {
            $data = [
                'main' => $this->admannouncement->like('Title', $searchannounce)->where('Status', 'Draft')->findAll()
            ];
            return view('dashboard/searchannounce',$data);
        }
    }

    //view announcement sa public side
    public function viewAnnouncement($id)
    {
        $data['announce'] = $this->admannouncement->where('AnnounceID', $id)->find();

        return view('admin/viewannouncement', $data);
        
    }

    public function savefeedbackannounce()
    {
        $data = [
            'feedback' => $this->request->getVar('Feedback'),
            'announceid' => $this->request->getVar('AnnounceID')
        ];

        $this->Feedback->save($data);
        
        return redirect()->to('/announcement');

    }

}
