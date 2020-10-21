<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\ContactFormMail;


class ContactController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
   

    public function create()
    {
        return view('contact');
    }


    public function store(Request $request)
    {
        $data = request()->validate([
            'name'=> 'required',
            'email'=> 'required|email',
            'subject'=> 'required',
            'message'=> 'required',
        ]);

       Mail::to('test@test.com')->send(new ContactFormMail($data));
       return redirect()->route('contact.index')->with ('success_message', 'Thank you for your message.');

    }
  
}
