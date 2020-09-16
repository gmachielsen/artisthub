<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Mail;
use App\Mail\SendArtwork;

class EmailController extends Controller
{
    public function send(Request $request) {
        $homeUrl = url('/');
        $artworkId = $request->get('artwork_id');
        $artworkSlug = $request->get('artwork_slug');

        $artworkUrl = $homeUrl.'/'.'kunstwerk/'.$artworkId.'/'.$artworkSlug;

        $data = array(
            'your_name'=>$request->get('your_name'),
            'your_email'=>$request->get('your_email'),
            'friend_name'=>$request->get('friend_name'),
            'artworkUrl'=>$artworkUrl,
        );
    $emailTo = $request->get('friend_email');
    Mail::to($emailTo)->send(new SendArtwork($data));
    return redirect()->back()->with('message', 'Deze pagina is via email met succes verzonden');
            
    }
}
