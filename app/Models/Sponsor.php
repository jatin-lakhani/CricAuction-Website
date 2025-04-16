<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Sponsor extends Model
{
    protected $fillable = [
        'auction_id',
        'name',
        'image',
        'price',
        'sponsor_of'
    ];

    public function getImageUrlAttribute()
    {
        return $this->image ? Storage::disk('public')->url($this->image) : null;
    }

    public function auction()
    {
        return $this->belongsTo(Auction::class);
    }
}
