<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;
use App\Mail\ThankyouMail;
use App\User; 
use App\Form_Submission;
use Carbon\Carbon; 
use Illuminate\Support\Facades\Crypt;
use App\ContactUs;
use App\Mail\ContactUsMail;



class JoinTableController extends Controller
{
    
    public function index($id2)
        {
            $id2 = Crypt::decrypt($id2);
                $data=DB::table('form_submissions')
                    ->join('users','users.id','=','form_submissions.user_id')
                    ->join('forms','forms.id','=','form_submissions.form_id')
                    ->select('form_submissions.id','users.name','users.email','form_submissions.user_id','form_submissions.participation','form_submissions.confirmation')
                    ->where('forms.id', $id2)
                    ->get();

            return view("checkin", [ "data" => $data ]);
             
        }


    public function sendEmail($id,$user_id)
    {
           
        $time = date("Y-m-d H:i:s");

        DB::table('form_submissions')
        ->where('id', $id)
        ->update(['time' => $time]);

        DB::table('form_submissions')
        ->where('id', $id)
        ->update(['participation' => 1]);
 
           

        $user = User::find($user_id);

                        
        if(!empty($user))
        {
            Mail::to($user->email)->send(new ThankyouMail());
            return back();
        }

    }    
          
    public function store(Request $request)
    {
        $msg =new ContactUs;
        $msg-> name = $request->name;
        $msg -> email = $request->email;
        $msg -> subject = $request->subject;
        $msg -> message = $request->message;

        $msg -> save();

        Mail::to('thillangarathna@gmail.com')->send(new ContactUsMail($msg));
    
        return back();

    }
}