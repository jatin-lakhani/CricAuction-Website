<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Storage;

class Player extends Model
{
    protected $fillable = [
        'auction_id',
        'team_id',
        'player_id',
        'player_firstname',
        'player_mobile_no',
        'player_age',
        'player_specification_one',
        'player_specification_two',
        'player_specification_three',
        'player_image',
        'player_crop_image',
        'crichero_profile_url',
        'base_value',
        'sold_value',
        'sold_at',
        'unsold_at',
        'is_team_owner',
        'is_non_playing_owner',
        'jersey_name',
        'jersey_number',
        'jersey_size',
        'trouser_size',
        'category',
        'extra_detail',
        'playerFormNo',
        'player_fathername',
        'playerTeamName',
        'playerStatus',
        'playerSelectedIcon',
        'is_reserved',
        'match',
        'run',
        'wicket',
        'payment_receipt',
    ];

    protected $casts = [
        'base_value' => 'double',
        'sold_value' => 'double',
        'is_team_owner' => 'boolean',
        'is_non_playing_owner' => 'boolean',
        'playerStatus' => 'integer',
        'playerSelectedIcon' => 'array',
    ];

    public function team()
    {
        return $this->belongsTo(Team::class);
    }

    public function auction()
    {
        return $this->belongsTo(Auction::class);
    }

    public function getPlayerImageUrlAttribute()
    {
        return $this->player_image ? Storage::disk('public')->url($this->player_image) : null;
        // return $this->profile_image ? Storage::disk('public')->url($this->profile) : Storage::disk('public')->url('upload/profile_image/default_profile.png');
    }
}
