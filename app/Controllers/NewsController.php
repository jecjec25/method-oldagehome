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
            'author'  => 'required|min_length[5]',
            'description'   => 'required|min_length[10]'
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
                'author' => $this->request->getVar('author'),
                'status' => 'Unarchive',
                'description' => $this->request->getVar('description')
            ];
    
            $this->newsevent->save($data);
    
            return redirect()->to('/newsAndevents')->with('success', 'Data has been Uploaded');
        }
        else
        {
            return redirect()->to('/newsAndevents')->with('error', 'Error uploading image.');
        }
    }
    else{
        $data['validation'] = $this->validator;
        echo'hindi mo na tumpak';
    }
    }
    public function updatenews()
    {
        $mnews = new NewsModel();
        $data['main'] = $mnews->where('status', 'Unarchive')->findAll();
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
            'author' => $this->request->getVar('author'),
            'picture' => $this->request->getVar('picture'),
            'description' => $this->request->getVar('description')
        ];


        $this->newsevent->update($id, $data);

        return redirect()->to('/updatenews')->with('success', 'Senior Citizen details updated successfully');
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
}
