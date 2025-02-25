<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Homecontroller extends Controller
{
    public function index()
    {
        return view('index');
    }

    public function test()
    {
        return view('emails.contact');
    }

    public function privacy()
    {
        return view('frontend.privacy');
    }

    public function terms()
    {
        return view('frontend.terms');
    }

    public function cancel()
    {
        return view('frontend.cancel');
    }

    public function shipping()
    {
        return view('frontend.shipping');
    }
}
