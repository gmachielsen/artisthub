<?php

namespace App\Http\Controllers;
use App\Artist;
use App\Job;
use Illuminate\Http\Request;

class ArtistController extends Controller
{
    public function __construct()
    {
        $this->middleware('artist', ['except'=>array('index')]);
    }

    public function index($id, Artist $artist)
    {
        return view('artist.index', compact('artist'));
    }

    public function create()
    {
        return view('artist.create');
    }

    public function savePersonalInformation(Request $request)
    {
        $user_id = auth()->user()->id;
        Artist::where('user_id', $user_id)->update([
            'artist_name' => request('artist_name'),
            'first_name' => request('first_name'),
            'last_name' => request('last_name'),
            'YearOfBirth' => request('YearOfBirth'),
            'email' => request('email'),
            'GSM' => request('GSM'),
            'phone' => request('phone'),
        ]);
        return redirect()->back()->with('message', 'Dank voor het invullen van uw persoonlijke gegevens, uw gegevens zijn nu opgeslagen');
    }

    public function saveCompanyInformation(Request $request)
    {
        $user_id = auth()->user()->id;
        Artist::where('user_id', $user_id)->update([
            'website' => request('website'),
            'company_name' => request('company_name'),
            'businessnumber' => request('businessnumber'),
            'taxnumber' => request('taxnumber'),
            'postal_code' => request('postal_code'),
            'street_name' => request('street_name'),
            'house_number' => request('house_number'),
            'city' => request('city'),
            'country' => request('country'),
        ]);
        return redirect()->back()->with('message', 'Dank voor het invullen van uw bedrijfsgegevens, uw gegevens zijn nu opgeslagen');
    }

    public function saveStoryAboutArtist(Request $request)
    {
        $user_id = auth()->user()->id;
        Artist::where('user_id', $user_id)->update([
            'shorttext' => request('shorttext'),
            'description' => request('description'),
        ]);
        return redirect()->back()->with('message', 'Dank voor het invullen van uw biografiegegevens, uw gegevens zijn nu opgeslagen');
    }

    public function profilePhoto(Request $request) 
    {
        $user_id = auth()->user()->id;
        if($request->hasfile('profile_photo'))
        {
            $file = $request->file('profile_photo');
            $ext = $file->getClientOriginalExtension();
            $filename = time().'.'.$ext;
            $file->move('uploads/profilephoto/',$filename);
            Artist::where('user_id', $user_id)->update([
                'profile_photo'=>$filename
            ]);

            return redirect()->back()->with('message', 'Uw profielfoto is met succes opgeslagen!');
        }
    }
}
