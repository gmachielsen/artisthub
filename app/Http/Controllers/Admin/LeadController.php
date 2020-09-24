<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Artworkrequest;

class LeadController extends Controller
{
    public function index()
    {
        $leads = Artworkrequest::whenSearch(request()->search)->paginate(20);

        return view('dashboard.leads.index', compact('leads'));
    }

    public function destroylead(Request $request){

        $id = request('id');

        $artrequest = Artworkrequest::where('id', $id);
        $artrequest->delete();
        session()->flash('success', 'Lead deleted successfully');
        return redirect()->back();
    }
}
