<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use DB;
use jazmy\FormBuilder\Models\Form;
use jazmy\FormBuilder\Models\Submission;
use Illuminate\Support\Facades\Crypt;

class DashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
        {
            $value = Session::get('event_id');
            $data=DB::table('events')
            ->select('id','eventname','description','venue','date','starttime','endtime','cover')
            ->where('id', $value)
            ->get();

            $forms = Form::getForUser1(auth()->user(), $value);
            return view("dashboard", [ "data" => $data ],compact('forms'));
        }
        public function index2($id)
        {
            $id = Crypt::decrypt($id);
            session(['event_id' => $id]);
            $data=DB::table('events')
            ->select('id','eventname','description','venue','date','starttime','endtime','cover')
            ->where('id', $id)
            ->get();

            $forms = Form::getForUser1(auth()->user(),$id);

            return view("dashboard", [ "data" => $data ,"forms" => $forms]);
            // return redirect('/dashboard')
            // ->with('data',$data)
            // ->with('forms',$forms);
        }
        public function destroy($id)
        {
            $id = Crypt::decrypt($id);   
            DB::table('events')
            ->where('id', $id)
            ->delete();

            DB::table('forms')
            ->where('event_id', $id)
            ->delete();

            DB::table('form_submissions')
            ->join('forms','forms.id','=','form_submissions.form_id')
            ->join('events','events.id','=','forms.event_id')
            ->where('events.id', $id)
            ->delete();


            return back();
            //return view("dashboard", [ "data" => $data ,"forms" => $forms]);
            // return redirect('/dashboard')
            // ->with('data',$data)
            // ->with('forms',$forms);
        }
}
