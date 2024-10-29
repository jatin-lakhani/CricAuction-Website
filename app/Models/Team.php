<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Storage;

class Team extends Model
{
    protected $fillable = [
        'team_name',
        'team_image',
        'team_point',
        'team_max_point',
        'team_short_name',
        'number_of_player',
        'auction_id',
        'shortcut_key',
        'teamUsedPoint',
        'maxBid',
        'numberOfPlayer',
        'team_id',
    ];

    protected $casts = [
        'price' => 'integer',
        'number_of_teams' => 'integer',
        'paymentStatus' => 'integer',
    ];
    
    public function auction()
    {
        return $this->belongsTo(Auction::class);
    }

    public function players()
    {
        return $this->hasMany(Player::class);
    }

    public function getTeamImageUrlAttribute()
    {
        return $this->team_image ? Storage::disk('public')->url($this->team_image) : null;
        // return $this->profile_image ? Storage::disk('public')->url($this->profile) : Storage::disk('public')->url('upload/profile_image/default_profile.png');
    }

}
