<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
Use App\admin;
use App\Mail\ApprovalMail;
use App\Mail\ApprovedMail;
use Illuminate\Support\Facades\Mail;
use DB;
use Illuminate\Support\Facades\Crypt;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function create()
    {
        return view('Admin.create');
    }
    public function store(Request $request)
    {
        $admin=new Admin;
        $admin -> user_id = auth()->user()->id;
        $admin -> organizationname = $request->organizationname;
        $admin -> fburl = $request->fburl;
        $admin -> linkedinurl = $request->linkedinurl;
        $admin -> eventcount = $request->eventcount;
        $admin -> comments = $request->comments;

        $admin -> save();

        $id = Crypt::encrypt(auth()->user()->id);

        $data = array(
            'id'      =>  $id,
            'name'      =>  auth()->user()->name,
            'email'   =>  auth()->user()->email,
            'organizationname'      =>  $request->organizationname,
            'fburl'   =>   $request->fburl,
            'linkedinurl'      =>  $request->linkedinurl,
            'eventcount'   =>   $request->eventcount,
            'comments'   =>   $request->comments,
        );

        DB::table('users')
            ->where('id',auth()->user()->id)
            ->update(['approval' => 2]);

        Mail::to('thillangarathna@gmail.com')->send(new ApprovalMail($data));
        return view('Admin.thankyou');

    }
    public function confirm($id)
        {
            DB::table('users')
            ->where('id', $id)
            ->update(['approval' => 1]);

            $email=DB::table('users')
            ->where('id', $id)
            ->pluck('email');

            $data=DB::table('users')
            ->where('id', $id)
            ->value('name');

            Mail::to($email)->send(new ApprovedMail($data));
            return 'Approved';
        }
}
