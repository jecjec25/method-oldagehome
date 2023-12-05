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
        return view('admin/products');
    }
    public function dash()
    {
        return view('dashboard/dash');
    }
    public function search()
    {
        return view('dashboard/search');
    }
    public function rule()
    {
        return view('dashboard/rule');
    }
    public function eligibility()
    {
        return view('dashboard/eligibility');
    }
    public function aboutus()
    {
        return view('dashboard/aboutus');
    }
    public function contactus()
    {
        return view('dashboard/contactus');
    }
    public function reports()
    {
        return view('dashboard/reports');
    }
    public function addservices()
    {
        return view('dashboard/addservices');
    }
    public function manageservices()
    {
        return view('dashboard/manageservices');
    }
}
