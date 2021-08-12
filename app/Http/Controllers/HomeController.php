<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {

        $url = Session::get('url');
        if ($url)
        {
            return redirect($url);
        }
        else
        {
        return redirect('/myevents');
        }
    }
    public function event()
    {
        return view('Event.event');
    }
    
}
