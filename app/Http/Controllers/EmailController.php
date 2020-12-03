<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Mail;
use App\Mail\SendArtwork;
use App\Mail\ContactPost;

class EmailController extends Controller
{
    public function send(Request $request) {
        $homeUrl = url('/');
        $artworkId = $request->get('artwork_id');
        $artworkSlug = $request->get('artwork_slug');

        $artworkUrl = $homeUrl.'/'.'kunstwerk/'.$artworkId.'/'.$artworkSlug;
        $data = array(
            'your_name'=> $request->get('your_name'),
            'your_email'=> $request->get('your_email'),
            'friend_name'=> $request->get('friend_name'),
            'url'=> $artworkUrl,
        );
    $emailTo = $request->get('friend_email');
    Mail::to($emailTo)->send(new SendArtwork($data));
    return redirect()->back()->with('message', 'Deze pagina is met succes gedeeld');
            
    }

    public function contactPost(Request $request){
        $this->validate($request, [
                        'name' => 'required',
                        'email' => 'required|email',
                ]);

   
                $data = array(
                    'name'=> $request->get('name'),
                    'email'=> $request->get('email'),
                    'mailto'=> $request->get('mailto'),
                    'subject'=> $request->get('subject'),
                    'message' => $request->get('message')
                );
            $emailTo = $request->get('mailto');
            Mail::to($emailTo)->send(new ContactPost($data));
            return redirect()->back()->with('message', 'Dit bericht is met succes verzonden');

    }

}
