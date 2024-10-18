<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Storage;

class Pricing extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'auction_id',
        'title',
        'ipaName',
        'number_of_teams',
        'description',
        'price',
        'is_default',
        'phoneNo',
        'paymentStatus',
        'paymentDate',
        'paymentScreenshot',
    ];

    protected $casts = [
        'price' => 'integer',
        'number_of_teams' => 'integer',
        'paymentStatus' => 'integer',
    ];

    public function getPaymentScreenshotUrlAttribute()
    {
        return $this->paymentScreenshot ? Storage::disk('public')->url($this->paymentScreenshot) : null;
        // return $this->profile_image ? Storage::disk('public')->url($this->profile) : Storage::disk('public')->url('upload/profile_image/default_profile.png');
    }
}
