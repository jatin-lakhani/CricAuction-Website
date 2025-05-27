<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Storage;

class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable, HasApiTokens;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        // 'uid',
        'name',
        'email',
        'email_verified_at',
        'password',
        'profile',
        'city',
        'firebase_token',
        'oauth_type',
        // 'signInType',
        'oauth_token',
        'status',
        'role',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
            'signInType' => 'json',
        ];
    }

    const STATUS = [
        'ACTIVE' => 'Active',
        'INACTIVE' => 'Inactive',
        'DELETED' => 'Deleted',
    ];

    public function getProfileImageUrlAttribute()
    {
        return $this->profile ? $this->profile : "";
    }
}
