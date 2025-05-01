<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AuctionCategory extends Model
{
    protected $fillable = [
        'auction_id',
        'name',
        'minumum_bid',
        'bid_increase',
    ];

    public function auction()
    {
        return $this->belongsTo(Auction::class);
    }
}
