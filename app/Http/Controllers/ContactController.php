<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{

    public function submit(Request $request)
    {
        // Validate form inputs
        $request->validate([
            'fname' => 'required|string|max:255',
            'lname' => 'required|string|max:255',
            'email' => 'required|email',
            'message' => 'nullable|string',
            'mobile' => 'nullable|digits:10',
        ]);

        // Prepare data for the email
        $data = [
            'firstName' => $request->input('fname'),
            'lastName' => $request->input('lname'),
            'email' => $request->input('email'),
            'mobile' => $request->input('mobile'),
            'message' => $request->input('message'),
        ];

        dd($data);
        // Send email
        Mail::send('emails.contact', $data, function ($message) use ($data) {
            $message->to('h12676773@gmail.com') // Replace with your admin email
                ->subject('New Contact Us Message');
        });

        // Redirect back with a success message
        return redirect()->back()->with('success', 'Your message has been sent successfully!');
    }
}
