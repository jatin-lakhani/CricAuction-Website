<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Auction;
use App\Models\VideoGallery;
use App\Models\Blog;
use App\Models\Faq;
use Carbon\Carbon;
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

    public function getapp()
    {
        return view('frontend.getapp');
    }

    public function auctionlist_today()
    {
        $today = Carbon::today();

        $today_auctions = Auction::with(['players', 'teams'])
            ->whereDate('auction_date', $today)
            ->get();

        $sorted = $today_auctions->sort(function ($a, $b) {
            $playerDiff = $b->players->count() - $a->players->count();
            if ($playerDiff === 0) {
                return $b->teams->count() - $a->teams->count();
            }
            return $playerDiff;
        })->values();

        return view('frontend.auctionlist.today', [
            'today_auctions' => $sorted
        ]);
    }
    public function auctionlist_upcoming()
    {
        $upcoming_auctions = Auction::with(['players', 'teams'])
            ->where('auction_date', '>', now())
            ->orderBy('auction_date', 'asc')
            ->get();

        $sorted = $upcoming_auctions->sort(function ($a, $b) {
            $dateDiff = Carbon::parse($a->auction_date)->timestamp - Carbon::parse($b->auction_date)->timestamp;

            if ($dateDiff === 0) {
                $playerDiff = $b->players->count() - $a->players->count();
                if ($playerDiff === 0) {
                    return $b->teams->count() - $a->teams->count();
                }
                return $playerDiff;
            }

            return $dateDiff;
        })->values();

        return view('frontend.auctionlist.upcoming', [
            'upcoming_auctions' => $sorted
        ]);
    }

    public function video_gallery()
    {
        $auctionVideos = VideoGallery::where('type', 'Auction')->latest()->get();
        $demoVideos = VideoGallery::where('type', 'Demo')->latest()->get();

        return view('frontend.video_gallery', compact('auctionVideos', 'demoVideos'));
    }


    public function blogs()
    {
        $blogs = Blog::latest()->get();
        return view('frontend.blogs', compact('blogs'));
    }


    public function faqPage()
    {
        $faqs = Faq::where('status', 'Active')->orderBy('order')->get();
        return view('frontend.faq', compact('faqs'));
    }


    public function blog_read($id)
    {
        $blog = Blog::findOrFail($id);
        return view('frontend.blog_read', compact('blog'));
    }
}
