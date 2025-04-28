<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Storage;

class Auction extends Model
{
    protected $fillable = [
        'auction_name',
        'auction_date',
        'auction_time',
        'bid_increase_by',
        'min_bid',
        'play_type',
        'player_per_team',
        'player_registration',
        'points_par_team',
        'venue',
        'auction_image',
        'auction_code',
        'current_auction_team_id',
        'current_auction_player_id',
        'currency_formatting',
        'created_at',
        'creator_id',
        'creator_phone',
        'creator_email',
        'payment_qr',
        'status'
    ];

    protected $casts = [
        'points_par_team' => 'double',
        'min_bid' => 'integer',
        'bid_increase_by' => 'double',
        'player_per_team' => 'double',
        'player_registration' => 'boolean',
    ];

    protected $appends = ['auction_image_url'];

    public function teams()
    {
        return $this->hasMany(Team::class);
    }

    public function players()
    {
        return $this->hasMany(Player::class);
    }
    public function pricing()
    {
        return $this->hasOne(Pricing::class)->latestOfMany();
    }
    public function oldPricing()
    {
        return $this->hasOne(Pricing::class)
            ->orderBy('created_at', 'desc')
            ->skip(1)
            ->take(1);
    }

    public function getAuctionImageUrlAttribute()
    {
        return $this->auction_image ? Storage::disk('public')->url($this->auction_image) : null;
        // return $this->profile_image ? Storage::disk('public')->url($this->profile) : Storage::disk('public')->url('upload/profile_image/default_profile.png');
    }

    public function bidSlaps()
    {
        return $this->hasMany(AuctionBidSlap::class);
    }

    public function bidders()
    {
        return $this->hasMany(AuctionBidder::class);
    }

    public function sponsors()
    {
        return $this->hasMany(Sponsor::class);
    }
}
