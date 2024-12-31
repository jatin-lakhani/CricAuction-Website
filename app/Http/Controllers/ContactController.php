<?php

namespace App\Http\Controllers;

use App\Mail\ContactFormMail;
use App\Models\Contact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    public function submit(Request $request)
    {
        // Form Validation
        $request->validate([
            'fname' => 'required|string|max:255',
            'lname' => 'required|string|max:255',
            'email' => 'required|email'
        ]);

        $data = [
            'fname' =>$request->fname,
            'lname' =>$request->lname,
            'email' =>$request->email,
            'mno' =>$request->mno,
            'message' =>$request->message,
        ];

        // Store data in the database
        Contact::create($data);

        // Send Mail to Admin
        Mail::to('h12676773@gmail.com')->send(new ContactFormMail($data));

        return back()->with('success','Thank You for contact us. Your message has been sent Successfully.');
    }
}
