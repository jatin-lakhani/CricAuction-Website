<?php

namespace App\Http\Controllers;

use App\Models\Auction;
use App\Models\Player;
use Illuminate\Http\Request;

class AuctionController extends Controller
{
    // public function showAuctions()
    // {
    //     $auctions = Auction::with('players')->take(3)->get();
    //     return view('index', compact('auctions'));
    // }

    public function showAuctions()
    {
        $today = now()->toDateString(); // Get today's date in 'Y-m-d' format
        $auctions = Auction::whereDate('auction_date', $today) // Filter by today's date
            ->with('players')
            ->take(3)
            ->get();

        return view('index', compact('auctions'));
    }
}
