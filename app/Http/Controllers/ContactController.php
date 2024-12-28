<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    public function submit(Request $request)
    {
        $request->validate([
            'fname' => 'required|string',
            'lname' => 'required|string',
            'email' => 'required|email',
        ]);

        $data = [
            'firstName' => $request->input('fname'),
            'lastName' => $request->input('lname'),
            'email' => $request->input('email'),
            'mobile' => $request->input('mobile'),
            'message' => $request->input('message'),
        ];

        Mail::send('emails.contact', $data, function ($message) use ($data) {
            $message->to('h12676773@gmail.com')
                ->subject('New Contact Us Message');
        });

        redirect()->back()->with('success', 'Your message has been sent successfully!');
    }
}
