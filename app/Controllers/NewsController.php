<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\NewsModel;
use App\Models\UserbookingModel;

class NewsController extends BaseController
{
    private $newsevent;
    private $userbooking;
    public function __construct()
    {
        $this->userbooking = new UserbookingModel();
        $this->newsevent = new NewsModel();

        helper(['form']);
    }
   

    public function adminnews()
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
         return view('dashboard/adminnews', $data);
    }

    // public function savenews()
    // {
    //     $rules = [
    //         'title'   => 'required|min_length[5]',
    //         'author'  => 'required|min_length[5]',
    //         'description'   => 'required|min_length[10]'
    //     ];

    //     if($this->validate($rules))
    //     {
    //         $data = [
                // 'title' => $this->request->getVar('title'),
                // 'author' => $this->request->getVar('author'),
                // 'picture' => $this->request->getVar('picture'),
                // 'description' => $this->request->getVar('description')
    //         ];

    //         $this->newsevent->save($data);
    //         return redirect()->to('newsAndevents');
            
    //     }
    //     else{
    //         $data['validation'] = $this->validator;
    //         echo'hindi mo na tumpak';
    //     }
    // }

        public function savenews()
        {

            $rules = [
                'title'   => 'required|min_length[5]',
                'Content'   => 'required|min_length[5]',
                'author'  => 'required|min_length[5]',
                'Category'   => 'required'
            ];
                $imagePath = $_SERVER['DOCUMENT_ROOT'];
            $image = $this->request->getFile('picture');
            if($this->validate($rules))
            {

            if ($image && $image->isValid() && !$image->hasMoved()) 
            {
                $myImage = $image->getRandomName();

                $image->move($imagePath . '/upload/news/',  $myImage);
        
                $data = [
                    'picture' => $image,
                    'picture' => $myImage,
                    'title' => $this->request->getVar('title'),
                    'Content' => $this->request->getVar('Content'),
                    'author' => $this->request->getVar('author'),
                    'status' => 'Draft',
                    'adminId' => $this->request->getVar('adminId'),
                ];  

                $categories = $this->request->getVar('Category');
                if (!empty($categories)) {
                    $data['Category'] = implode(', ', $categories);
                }
        
                $this->newsevent->save($data);
        
                return redirect()->to('/updatenews')->with('success', 'Data has been Uploaded');
            }
            else
            {
                return redirect()->to('/newsAndevents')->with('error', 'Error uploading image.');
            }


        }
        else{
            $data['validation'] = $this->validator;
            echo'Invalid, try again.';
        }
        }
        public function updatenews()
        {
            $mnews = new NewsModel();
            
            $data = ['notif' => $this->userbooking->where('status', 'pending')->findAll(),
            'getnotif' => $this->userbooking
                   ->select('userbooking.bookingId, userbooking.lastname, userbooking.firstname, 
                   userbooking.middlename, userbooking.contactnum, userbooking.event, 
                   userbooking.time, userbooking.prefferdate, userbooking.equipment, 
                   userbooking.comments, userbooking.status, userbooking.usersignsId, 
                   user.userID, user.LastName, user.FirstName')
                   ->join('user', 'user.userID = userbooking.usersignsId')
                   ->where('userbooking.status', 'Accepted')->orwhere('userbooking.status', 'Pending')
                   ->findAll(),
                   'countNotifs' => $this->userbooking->where('status', 'pending')->countAllResults(),
                   'main' => $mnews->where('status', 'Draft')->findAll()
               ];
            
            return view('dashboard/managenews', $data);
        }

        public function update($id)
        {
            $data = ['notif' => $this->userbooking->where('status', 'pending')->findAll(),
            'getnotif' => $this->userbooking
                   ->select('userbooking.bookingId, userbooking.lastname, userbooking.firstname, 
                   userbooking.middlename, userbooking.contactnum, userbooking.event, 
                   userbooking.time, userbooking.prefferdate, userbooking.equipment, 
                   userbooking.comments, userbooking.status, userbooking.usersignsId, 
                   user.userID, user.LastName, user.FirstName')
                   ->join('user', 'user.userID = userbooking.usersignsId')
                   ->where('userbooking.status', 'Accepted')->orwhere('userbooking.status', 'Pending')
                   ->findAll(),
                   'countNotifs' => $this->userbooking->where('status', 'pending')->countAllResults()
               ];
            $data['main'] = $this->newsevent->where('id', $id)->first();

            return view('dashboard/editnews', $data);

        }
    public function EditNews($id)
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
       
        $rules = [
            'title'   => 'required|min_length[5]',
            'Content'   => 'required|min_length[5]',
            'author'  => 'required|min_length[5]',
            'Category'   => 'required'
        ];
            $imagePath = $_SERVER['DOCUMENT_ROOT'];
        $image = $this->request->getFile('picture');
        if($this->validate($rules))
        {

        if ($image && $image->isValid() && !$image->hasMoved()) 
        {
            $myImage = $image->getRandomName();

            $image->move($imagePath . '/upload/news/',  $myImage);
    
            $data = [
                'picture' => $image,
                'picture' => $myImage,
                'title' => $this->request->getVar('title'),
                'Content' => $this->request->getVar('Content'),
                'author' => $this->request->getVar('author'),
                'status' => $this->request->getVar('status'),
                'adminId' => $this->request->getVar('adminId'),
            ];  

            $categories = $this->request->getVar('Category');
            if (!empty($categories)) {
                $data['Category'] = implode(', ', $categories);
            }
            $this->newsevent->update($id, $data);

            return redirect()->to('/updatenews')->with('success', 'Senior Citizen details updated successfully');
        }
        else
        {
            return redirect()->to('/newsAndevents')->with('error', 'Error uploading image.');
        }


    }
    else{
        $data['validation'] = $this->validator;
        echo'Invalid, try again.';
    }

    }

    public function newsarchived()
    {         $data = [
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
        $data['main']= $this->newsevent->where('status','Archive')->findAll();
        return view('dashboard/newsarchived', $data);
    }

    public function Archive()
    {
        $news = $this->request->getVar('update');

        $update = $this->NewsDetails($news);
                        $this->updateMyVisibility($update);
        return redirect()->to('/updatenews');
    }

    private function NewsDetails($news)
    {
        $update = $this->newsevent->where('id', $news)->first();

        return $update;
    }

    private function updateMyVisibility($update)
    {
        $data = [
            'status' => 'Archive',
        ];

        $this->newsevent->update($update, $data);
        
    }
    
    public function searchnews()
    {
         $searchnews = $this->request->getVar('searchnews');
        if($searchnews)
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
                'news' => $this->newsevent->like('title', $searchnews)->where('status', 'Draft')->findAll()
            ];
            return view('dashboard/searchnews',$data);
        }
    }

    public function published()
    {         $data = [
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
         $data['main'] = $this->newsevent->where('status', 'published')->findAll();
        return view('dashboard/newspublished', $data);
    }
    public function PubArchive()
    {
        $news = $this->request->getVar('update');

        $update = $this->NewsDetails($news);
                        $this->updateMyVisibility($update);
        return redirect()->to('/newspublished');
    }

    private function NewsPublishedArch($news)
    {
        $update = $this->newsevent->where('id', $news)->first();
        return $update;
    }

    private function updateMyPublished($update)
    {
        $data = [
            'status' => 'Archive',
        ];

        $this->newsevent->update($update, $data);
        
    }

    //for connection of user and event

}
    