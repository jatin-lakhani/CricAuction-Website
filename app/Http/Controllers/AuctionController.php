<?php

namespace App\Http\Controllers;

use App\Models\Auction;
use App\Models\Player;
use Illuminate\Http\Request;

class AuctionController extends Controller
{
    public function showAuctions()
    {
        $today = now()->toDateString();
        $yesterday = now()->subDay()->toDateString(); 

        $auctions = Auction::whereDate('auction_date', $today)
            ->with('players')
            ->take(3)
            ->get();

        if ($auctions->isEmpty()) {
            $auctions = Auction::whereDate('auction_date', $yesterday)
                ->with('players')
                ->take(3)
                ->get();
            $title = "Recent"; 
        } else {
            $title = "Today's"; 
        }

        return view('index', compact('auctions', 'title'));
    }
}
