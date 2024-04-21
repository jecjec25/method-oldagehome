<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\NewsModel;
use App\Models\EventsModel;

class UserViewPostController extends BaseController
{
    private $newsevents;
    private $events;

    public function __construct()
    {
        $this->newevents = new NewsModel();
        $this->events = new EventsModel();
        helper(['form']);
    }

    public function userViewpost()
    {
        $data['news'] = $this->newevents->where('status', 'Published')->findAll();
        $data['events'] = $this->events->where('status', 'Published')->findAll();
        return view('admin/userViewpost', $data);
    }




}
