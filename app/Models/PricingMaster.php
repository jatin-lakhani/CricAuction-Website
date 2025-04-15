<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PricingMaster extends Model
{
    protected $fillable = ['title', 'description', 'ipaName', 'price', 'team'];

}
