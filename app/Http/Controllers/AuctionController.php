<?php

namespace App\Http\Controllers;

use App\Models\Auction;
use App\Models\Player;
use Illuminate\Http\Request;

class AuctionController extends Controller
{
    public function showAuctions()
    {
        $auctions = Auction::with('players')->take(3)->get();
        return view('index', compact('auctions'));
    }
}
