<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Illuminate\Support\Facades\Crypt;

class MailURLController extends Controller
{
    public function confirm($id)
        {
            $id = Crypt::decrypt($id);
            DB::table('form_submissions')
            ->where('id', $id)
            ->update(['confirmation' => 1]);

            return redirect('/');
        }
        public function confirmAdmin($id)
        {
            $id = Crypt::decrypt($id);
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
