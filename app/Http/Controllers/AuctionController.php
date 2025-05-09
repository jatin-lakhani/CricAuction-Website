<?php

namespace App\Http\Controllers;

use App\Models\Auction;
use Carbon\Carbon;
use App\Models\Player;
use Illuminate\Http\Request;
use App\Models\Testimonial;

class AuctionController extends Controller
{
    // public function showAuctions()
    // {
    //     $today = now()->toDateString();
    //     $yesterday = now()->subDay()->toDateString(); 

    //     $auctions = Auction::whereDate('auction_date', $today)
    //         ->with('players')
    //         ->take(3)
    //         ->get();

    //     if ($auctions->isEmpty()) {
    //         $auctions = Auction::whereDate('auction_date', $yesterday)
    //             ->with('players')
    //             ->take(3)
    //             ->get();
    //         $title = "Recent"; 
    //     } else {
    //         $title = "Today's"; 
    //     }

    //     return view('index', compact('auctions', 'title'));
    // }

    public function showAuctions()
    {
        $today = Carbon::today();

        $auctions = Auction::with('pricing')
            ->whereDate('auction_date', $today)
            ->get()
            ->sortByDesc(function ($auction) {
                $pricing = $auction->pricing;

                if ($pricing && $pricing->paymentStatus == 2) {
                    return 999999; 
                }

                return $pricing->number_of_teams ?? 0;
            })
            ->take(4);
        
        $upcoming_auctions = Auction::where('auction_date', '>', now())
            ->orderBy('auction_date', 'asc')
            ->limit(4)
            ->get();
        
        $testimonials = Testimonial::where('status', 'Active')->get();
        // dd($testimonials);
        return view('index', compact('auctions','upcoming_auctions', 'testimonials'));
    }

    
}
