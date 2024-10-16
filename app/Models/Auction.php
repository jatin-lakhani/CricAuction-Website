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
        'created_at',
        'creator_id'
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

    public function getAuctionImageUrlAttribute()
    {
        return $this->auction_image ? Storage::disk('public')->url($this->auction_image) : null;
        // return $this->profile_image ? Storage::disk('public')->url($this->profile) : Storage::disk('public')->url('upload/profile_image/default_profile.png');
    }

}
