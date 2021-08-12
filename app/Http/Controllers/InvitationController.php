<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;
use App\Mail\InviteMail;
use App\User; 
use App\Form_Submission;
use Carbon\Carbon; 
use Session;
use jazmy\FormBuilder\Models\Form;
use jazmy\FormBuilder\Models\Submission;
use Illuminate\Support\Facades\Crypt;

class InvitationController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function create($id2)
        {
            $id2 = Crypt::decrypt($id2);
            $data=DB::table('form_submissions')
                ->join('users','users.id','=','form_submissions.user_id')
                ->join('forms','forms.id','=','form_submissions.form_id')
                ->select('form_submissions.id','users.name','users.email','form_submissions.user_id','form_submissions.is_invited')
                ->where('forms.id', $id2)
                ->get();
              return view("Invite", [ "data" => $data ]);             
        }
          public function sendEmail($id,$user_id)
        {
            
            if(!empty($user))
                {
                    Mail::to($user->email)->send(new InviteMail());
                    return back();
                }
        }
        public function store(Request $request)
        {
            $email = $request->input('check');    
            if(!empty($email))
            {
                foreach($email as $oneemail){

                    DB::table('form_submissions')
                    ->join('users','users.id','=','form_submissions.user_id')
                    ->join('forms','forms.id','=','form_submissions.form_id')
                    ->select('form_submissions.id','users.name','users.email','form_submissions.user_id','form_submissions.participation')
                    ->where('email', $oneemail)
                    ->update(['is_invited' => 1]);

                    $value = Session::get('event_id');

                    $emailid=DB::table('form_submissions')
                    ->join('users','users.id','=','form_submissions.user_id')
                    ->join('forms','forms.id','=','form_submissions.form_id')
                    ->select('form_submissions.id')
                    ->where('users.email', $oneemail)
                    ->where('forms.event_id', $value)
                    ->value('id');
            
                    $eventname=DB::table('events')
                    ->where('id', $value)
                    ->value('eventname');

                    $description=DB::table('events')
                    ->where('id', $value)
                    ->value('description');

                    $venue=DB::table('events')
                    ->where('id', $value)
                    ->value('venue');

                    $date=DB::table('events')
                    ->where('id', $value)
                    ->value('date');

                    $starttime=DB::table('events')
                    ->where('id', $value)
                    ->value('starttime');

                    $endtime=DB::table('events')
                    ->where('id', $value)
                    ->value('endtime');

                    $cover=DB::table('events')
                    ->where('id', $value)
                    ->value('cover');

                    $id = Crypt::encrypt($emailid);

                    $data1 = array(
                        'eventname'      =>  $eventname,
                        'description'      =>  $description,
                        'venue'   =>  $venue,
                        'date'      =>  $date,
                        'starttime'   =>   $starttime,
                        'endtime'      =>  $endtime,
                        'cover'      =>  $cover,
                        'id'      => $id,
                    );
                    
                    Mail::to($email)->send(new InviteMail($data1));
                }
                //Mail::to($email)->send(new InviteMail($data1));

                // $data=DB::table('events')
                // ->select('eventname','description','venue','date','starttime','endtime','cover')
                // ->where('id', $value)
                // ->get();

                // $forms = Form::getForUser(auth()->user());
                // return view("dashboard", [ "data" => $data ],compact('forms'));
            $value = Session::get('event_id');
            $data=DB::table('events')
            ->select('id','eventname','description','venue','date','starttime','endtime','cover')
            ->where('id', $value)
            ->get();

            $forms = Form::getForUser1(auth()->user(), $value);
            return view("dashboard", [ "data" => $data ],compact('forms'));
            }
            else
            {
                return back()->withInput();
            }
        }
        public function confirm($id)
        {
            DB::table('form_submissions')
            ->where('id', $id)
            ->update(['confirmation' => 1]);

            return redirect('/');
        } 
}
