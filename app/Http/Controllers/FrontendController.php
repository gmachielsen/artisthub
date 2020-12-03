<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Artist;
use App\Staffmember;

use Mail;


class FrontendController extends Controller
{
    public function aboutUs()
    {
        $staffmembers = Staffmember::get();
        return view('frontend.aboutUs', compact('staffmembers'));
    }

    public function staffmembers()
    {
        return view('frontend.staffmembers');
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

  
    public function allartists()
    {

        $artists = Artist::paginate(50);
        return view('frontend.artists', compact('artists'));
    }
}
