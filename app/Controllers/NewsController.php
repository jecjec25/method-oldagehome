<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\NewsModel;

class NewsController extends BaseController
{
    private $newsevent;
    
    public function __construct()
    {
        $this->newsevent = new NewsModel();

        helper(['form']);
    }
   

    public function adminnews()
    {
        return view('dashboard/adminnews');
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
                'Content'   => 'required|min_length[10]',
                'author'  => 'required|min_length[5]',
                'Category'   => 'required'
            ];

            $image = $this->request->getFile('picture');
            if($this->validate($rules))
            {

            if ($image && $image->isValid() && !$image->hasMoved()) 
            {
                $myImage = $image->getRandomName();

                $image->move(WRITEPATH . 'uploads', $myImage);
        
                $data = [
                    'picture' => $image,
                    'picture' => 'uploads/' . $myImage,
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
            $data['main'] = $mnews->where('status', 'Draft')->findAll();
            return view('dashboard/managenews', $data);
        }

        public function update($id)
        {
            $data['main'] = $this->newsevent->where('id', $id)->first();

            return view('dashboard/editnews', $data);

        }
    public function EditNews($id)
    {

        $data = [
            'title' => $this->request->getVar('title'),
            'Content' => $this->request->getVar('Content'),
            'author' => $this->request->getVar('author'),
            'picture' => $this->request->getVar('picture'),
            'status' => $this->request->getVar('status')
        ];

        $categories = $this->request->getVar('Category');
        if (!empty($categories)) {
            $data['Category'] = implode(', ', $categories);
        }


        $this->newsevent->update($id, $data);

        return redirect()->to('/updatenews')->with('success', 'Senior Citizen details updated successfully');
    }

    public function newsarchived()
    {
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
                'news' => $this->newsevent->like('title', $searchnews)->findAll()
            ];
            return view('dashboard/searchnews',$data);
        }
    }

    public function published()
    {
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
    