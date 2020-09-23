<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Artworkrequest;

class LeadController extends Controller
{
    public function index()
    {
        $leads = Artworkrequest::paginate(20);

        return view('dashboard.leads.index', compact('leads'));
    }
}
