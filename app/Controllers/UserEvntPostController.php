<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\EventsModel;

class UserEvntPostController extends BaseController
{
    private $userevent;

    public function __construct()
    {
        $this->userevent = new EventsModel();
    }

    public function userEventpost()
    {
        return view ('admin/userEventPost');
    }

    public function usersavepost()
    {
      
        $data = [
            'usersignsId' => $this->request->getPost('usersignsId'),
            'Title' => $this->request->getPost('Title'),
            'Description' => $this->request->getPost('Description'),
            'Organizer' => $this->request->getPost('Organizer'),
            'Start_date' => $this->request->getPost('Start_date'),
            'End_date' => $this->request->getPost('End_date'),
            'Category' => $this->request->getPost('Category'),
            'Atendees' => $this->request->getPost('Atendees'),
            'Attachments' => $this->request->getPost('Attachments'),
            'Status' => 'Draft',
            'type' => 'user',
        ];
        $categories = $this->request->getVar('Category');
        if (!empty($categories)) {
            $data['Category'] = implode(', ', $categories);
        }
        $userevent = new EventsModel();

        $userevent->save($data);
        session()->setFlashdata('success', 'The data has been saved sucessfully.');
        return redirect()->to('/usereventpost');
    }
}
