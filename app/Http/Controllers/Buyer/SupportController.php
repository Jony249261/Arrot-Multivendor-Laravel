<?php

namespace App\Http\Controllers\Buyer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Mail;

class SupportController extends Controller
{
    public function index(){
        return view('buyer.support.index');
    }
    public function contactSubmit(Request $request){
        Mail::send('emails', [
            'name'    => $request->name,
            'email'   => $request->email,
            'phone'   => $request->phone,
            'company' => $request->company,
            'message' => $request->message
        ],function($mail) use($request){
            $mail->from(env('MAIL_FROM_ADDRESS'),$request->name);
            $mail->to("jony.just.cse@gmail.com")->subject('contact Us Message');

            
        });

        return "Message Has been Sent successfully";
    }
}
