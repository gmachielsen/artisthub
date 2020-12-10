<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Artist;
use App\Staffmember;
use App\Subscriber;
use App\Artwork;
use App\Style;
use App\Category;

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

    public function subscribe(Request $request)
    {
        $this->validate($request,[
            'email'=>'required|min:2',
        ]);
        Subscriber::create([
            'email' => request('email'),
        ]);
        $artworks = Artwork::latest()->limit(12)->where('status', 1)->get();
        $artists = Artist::latest()->limit(8)->get();
        $categories = Category::all();
        $styles = Style::all();

        return view('welcome', compact('artworks', 'artists', 'categories', 'styles'));
    }

  
    public function allartists()
    {

        $artists = Artist::paginate(50);
        return view('frontend.artists', compact('artists'));
    }
}
