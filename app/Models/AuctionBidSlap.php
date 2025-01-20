<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AuctionBidSlap extends Model
{
    protected $fillable = [
        'auction_id',
        'upto_amount',
        'increment_value',
    ];

    public function auction()
    {
        return $this->belongsTo(Auction::class);
    }

}
