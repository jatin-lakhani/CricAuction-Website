<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AuctionBidder extends Model
{
    protected $fillable = [
        'auction_id',
        'creator_id',
    ];

    public function auction()
    {
        return $this->belongsTo(Auction::class);
    }
}
