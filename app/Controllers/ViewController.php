<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class ViewController extends BaseController
{
    public function home()
    {
        return view('admin/home');
    }
    public function contact()
    {
        return view('admin/contact');
    }
    public function eligability()
    {
        return view('admin/eligibility');
    }
    public function about()
    {
        return view('admin/about');
    }
    public function rules()
    {
        return view('admin/rules');
    }
    public function service()
    {
        return view('admin/service');
    }
    public function products()
    {
        return view('admin/shop');
    }
}
