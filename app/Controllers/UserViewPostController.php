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
        $data['events'] = $this->events->where('status', 'Published')->where('type', 'user')->findAll();
        return view('admin/userViewpost', $data);
    }




}
