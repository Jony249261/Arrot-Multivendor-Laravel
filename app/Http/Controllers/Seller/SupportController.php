<?php

namespace App\Http\Controllers\Seller;

use App\Contact;
use App\Http\Controllers\Controller;
use App\Http\Controllers\EmailController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class SupportController extends Controller
{
    public function index(){
        return view('seller.supports.index');
    }

    public function sendMessage(Request $request)
  {
    //   dd($request->all());
      $request->validate([
          'name' => 'required|string',
          'phone' => 'required|numeric|digits:11',
          'email' => 'required|email',
          'company' => 'sometimes|nullable',
          'message' => 'required'
      ]);

      $contact = new Contact();
      $contact->user_id = auth()->user()->id;
      $contact->buyer_id = auth()->user()->seller_id;
      $contact->name = $request->name;
      $contact->phone = $request->phone;
      $contact->email = $request->email;
      $contact->company = $request->company;
      $contact->message = $request->message;
      $contact->save();

      if($contact != null){
          EmailController::contactMessageSend($contact->name,$contact->email,$contact->message);
          Session::flash('success','Message has been sent.');
          return redirect()->back();
      }

  }
}
