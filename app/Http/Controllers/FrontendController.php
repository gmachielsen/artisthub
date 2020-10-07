<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FrontendController extends Controller
{
    public function staffmembers()
    {
        return view('frontend.aboutUs');
    }

    public function vacancies()
    {
        return view('frontend.vacancies');
    }

    public function blogindex()
    {
        return view('frontend.blogs');
    }

    public function newsindex()
    {
        return view('frontend.news');
    }

    public function contact()
    {
        return view('frontend.contact');
    }
}
