<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
Use App\event;
Use App\user;
Use DB;
use Illuminate\Support\Facades\Crypt;

class EventController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
        {
            $id=auth()->user()->id;
            $data = Event::orderBy('id','desc')->where('user_id', $id)->get();
            // $data=DB::table('events')
            // ->join('users','users.id','=','events.user_id')
            // ->select('events.id','events.eventname','events.description','events.venue','events.date','events.starttime','events.endtime','events.cover')
            // ->where('users.id', $id)
            // ->orderBy('events.id','DESC')
            // ->get();

            return view("Event.myevents", [ "data" => $data ]);
             
        }
    public function create()
    {
        $id=auth()->user()->id;
        $approval = User::where('id', $id)->pluck('approval');
        if($approval=="[1]")
        {
            return view('Event.create');
        }
        else if($approval=="[0]")
        {
            return redirect('/admin');
        }
        else if($approval=="[2]")
        {
            return view('Admin.thankyou');
        }
    }
    public function store(Request $request)
    {
        $event=new Event;
        $event-> user_id = auth()->user()->id;
        $event -> eventname = $request->eventname;
        $event -> description = $request->description;
        $event -> venue = $request->venue;
        $event -> date = $request->date;
        $event -> starttime = $request->starttime;
        $event -> endtime = $request->endtime;

        $imagePath=request('cover')->store('uploads','public');
        $event -> cover = $imagePath;

        $event -> save();

        return redirect('/createform');
    }
    public function edit($id)
        {
            $id = Crypt::decrypt($id);
            $data = Event::where('id', $id)->firstOrFail();
            // $data=DB::table('events')
            // ->select('id','eventname','description','venue','date','starttime','endtime','cover')
            // ->where('id', $id)
            // ->get();

            return view('Event/edit',
            [
                'data' => $data, 
            ]);
        }
    public function update(Request $request)
    {
        $event=new Event;
        $event -> id = $request->id;
        $id=$request->id;
        $event = Event::find($id);
        $event -> user_id = auth()->user()->id;
        $event -> eventname = $request->eventname;
        $event -> description = $request->description;
        $event -> venue = $request->venue;
        $event -> date = $request->date;
        $event -> starttime = $request->starttime;
        $event -> endtime = $request->endtime;

        if ($request->hasFile('cover')) 
        {
            $imagePath=request('cover')->store('uploads','public');
            $event -> cover = $imagePath;
            $event -> save();
        }
        else
        {
            $event -> save();
        }
        //return redirect('viewevent',['id' => Crypt::encrypt($id) ]);

        return redirect()
                    ->route('viewevent',['id' => Crypt::encrypt($id) ]);
    }
}
