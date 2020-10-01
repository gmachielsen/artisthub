<?php

namespace App\Http\Controllers;
use App\Artwork;
use App\Artist;
use App\Message;
use App\Artworkrequest;
use App\User;
use App\Profile;
use Auth;
use DB;

use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Builder;

class ArtworkController extends Controller
{
    public function __construct()
    {
        $this->middleware('artist', ['except'=>array('index', 'show', 'apply', 'store', 'sendmessagewithprofile', 'sendmessage', 'artworkrequest', 'allartworks', 'allartists', 'searchArtworks' )]);
    }

    public function index()
    {
        $artworks = Artwork::latest()->limit(12)->where('status', 1)->get();
        $artists = Artist::latest()->limit(8)->get();

        return view('welcome', compact('artworks', 'artists'));
    }

    public function allartworks(Request $request)
    {
    

        $columns = [
            'category_id', 'style_id', 'technic_id', 'framed', 'orientation',
        ];




        foreach ($columns as $column) {
            if (request()->has($column)) {



                $collection = Artwork::get();
                $queries = [];

                $collection = $collection->where($column, request($column));
                $queries[$column] = request($column);

                $artworks = $collection->append('queries');
                return view('index', compact('artworks'));

            } else {

                $artworks = Artwork::paginate(50);

                return view('index', compact('artworks'));

            }
        }

       
    }

    public function allartists()
    {

        $artists = Artist::paginate(50);
        return view('artist.artists', compact('artists'));
        
    }

    public function show($id, Artwork $artwork)
    {
        return view('artworks.show', compact('artwork'));
    }

    public function artist()
    {
        return view('artist.index');
    }

    public function myArtwork()
    {
        $artworks = Artwork::where('user_id', auth()->user()->id)->get();
        return view('artworks.myArt', compact('artworks'));
    }

    public function create()
    {
        return view('artworks.create');
    }

    public function store(Request $request)
    {
        $this->validate($request,[
            'title'=>'required|min:2',
            'picture' => 'required|mimes:jpeg,jpg,png',
            'description' => 'required|string|min:20',
            'width' => 'required',
            'height' => 'required',
            'year' => 'required',
            'price' => 'required',
        ]);
        $user_id = auth()->user()->id;
        $artist = Artist::where('user_id', $user_id)->first();
        $artist_id = $artist->id;

        if($request->hasFile('picture')){
            $file = $request->file('picture');
            $ext = $file->getClientOriginalExtension();
            $filename = time().'.'.$ext;
            $file->move('uploads/artworks/',$filename);
        
            Artwork::create([
                'user_id' => $user_id,
                'artist_id' => $artist_id,
                'title' => request('title'),
                'slug' => str_slug(request('title')),
                'width' => request('width'),
                'height' => request('height'),
                'orientation' => request('orientation'),
                'description' => request('description'),
                'style_id' => request('style_id'),
                'category_id' => request('category_id'),
                'technic_id' => request('technic_id'),
                'year' => request('year'),
                'price' => request('price'),
                'rent' => request('rent'), 
                'picture'=> $filename,
                'status' => request('status'),
                'framed' => request('framed'),
            ]);
        }
        return redirect()->back()->with('create.artwork','Artwork created successfully');       
    }

    public function edit($id)
    {
        $artwork = Artwork::findOrFail($id);
        return view('artworks.edit', compact('artwork'));
    }

    public function update(Request $request, $id)
    {
    	$this->validate($request,[
    		'title'=>'required|min:3',
        ]);

        $artwork = Artwork::find($id);

        $artwork->title = request('title');
        $artwork->slug = str_slug(request('title'));
        $artwork->width = request('width');
        $artwork->height = request('height');
        $artwork->orientation = request('orientation');
        $artwork->description = request('description');
        $artwork->style_id = request('style_id');
        $artwork->category_id = request('category_id');
        $artwork->technic_id = request('technic_id');
        $artwork->year = request('year');
        $artwork->price = request('price');
        $artwork->rent = request('rent');
        $artwork->status = request('status');
        $artwork->framed = request('framed');

        if($request->hasFile('picture')){
            $file = $request->file('picture');
            $ext = $file->getClientOriginalExtension();
            $filename = time().'.'.$ext;
            $file->move('uploads/artworks/',$filename);
            $artwork->picture = $filename;
            }
        $artwork->save();

       

   			// Artwork::where('id',$id)->update([
            //     'title' => request('title'),
            //     'slug' => str_slug(request('title')),
            //     'width' => request('title'),
            //     'height' => request('height'),
            //     'orientation' => request('orientation'),
            //     'description' => request('description'),
            //     'style_id' => request('style_id'),
            //     'category_id' => request('category_id'),
            //     'technic_id' => request('technic_id'),
            //     'year' => request('year'),
            //     'price' => request('price'),
            //     'rent' => request('rent'), 
            //     'status' => request('status'),
            //     'framed' => request('framed'),
            //    ]);
            //    if($request->hasFile('picture')){
            //     $file = $request->file('picture');
            //     $ext = $file->getClientOriginalExtension();
            //     $filename = time().'.'.$ext;
            //     $file->move('uploads/artworks/',$filename);


            //    }
   		
        return redirect()->back()->with('message','Kunstwerk succesvol aangepast!');
    }

    public function apply(Request $request, $id)
    {
        $artworkId = Artwork::find($id);
        $userId = auth()->user()->id;
        $user = Profile::find($userId);
        Artworkrequest::create([
            'artwork_id' => $artworkId,
            'user_id' => $user,
        ]);

        return redirect()->back()->width('message', 'Interesse in dit kunstwerk met succes getoond!');
    }


    public function lead()
    {
        $user = auth()->user()->id;
        $leads = Artworkrequest::with('artwork', 'user')->get();
        return view('artworks.leads', compact('leads'));
    }

    public function viewlead($userid, Profile $profile)
    {        
        return view('artworks.leadview', compact('profile'));
    }

    public function destroylead(Request $request){

        $id = request('id');

        $artrequest = Artworkrequest::where('id', $id);
        $artrequest->delete();
        return redirect()->back();
    }

    public function delete(Request $request, $id)
    {
        $lead = Artworkrequest::find($id)->get();
    }

    public function sendmessagewithprofile(Request $request, $id)
    {

        $message = new Message;
        $message->artwork_id = $id;
        $message->user_id = auth()->user()->id;
        $message->email = auth()->user()->email;
        $message->name = auth()->user()->name;
        $message->phone = request('phone');
        $message->message = request('message');
        $message->save();

        return redirect()->back()->with('send.message', 'Artwork created successfully');       

    }

    public function sendmessage(Request $request, $id)
    {
        $artworkId = Artwork::find($id);

        Message::create([
            'artwork_id' => $artworkId,
            'message' => request('message'),
            'phone' => request('phone'),
            'email' => request('email'),
            'name' => request('name'),
        ]);
        return redirect()->back()->with('send.message', 'Artwork created successfully');       

    }

    public function messages()
    {
        $user = auth()->user()->id;
        $messages = Message::with('artwork', 'user')->get();
        return view('artworks.messages', compact('messages'));
    }


    public function deletemessage(Request $request){

        $id = request('id');

        $artrequest = Message::where('id', $id);
        $artrequest->delete();
        return redirect()->back();
    }

    public function searchArtworks(Request $request){
        $keyword = $request->get('keyword');
        $artwork = Artwork::where('title', 'like', '%'.$keyword.'%')->limit(5)->get();
        return response()->json($artwork);
    }
}
