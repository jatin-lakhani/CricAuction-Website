<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BankDetail extends Model
{
    protected $fillable = [
        'name',
        'accountNo',
        'accountType',
        'bankName',
        'ifscCode',
        'upiId',
        'paypalId',
        'whContact'
    ];
}
