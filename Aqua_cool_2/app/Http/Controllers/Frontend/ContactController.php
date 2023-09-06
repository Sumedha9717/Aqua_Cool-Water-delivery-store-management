<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Mail\ContactMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    //---------------------------------------------------------------------Index Function-----------------------------------------------

    public function index()
    {
        return view('frontend.contact.index');
    }

    //---------------------------------------------------------------------sendmail Function-----------------------------------------------

    public function sendMail(Request $request)
    {
        $details = [
            'f_name' => $request->f_name,
            'l_name' => $request->l_name,
            'subject' => $request->subject,
            'email' => $request->email,
            'city' => $request->city,
            'phone' => $request->phone,
            'msg' => $request->msg
        ];

        Mail::to('chinthig2@gmail.com')->send(new ContactMail($details));
        return back()->with('message_sent', "Your message has been sent successfully..!");
    }
}
