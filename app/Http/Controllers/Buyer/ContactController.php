<?php

namespace App\Http\Controllers\Buyer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public static function contactMessageSend($contact_name,$contact_email,$message)
    {
        $data = [
            'name' => $contact_name,
            'message' => $message
        ]
        Mail::to($contact_email)->send(new ContactMessage($data));
    }
}
