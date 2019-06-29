<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Tymon\JWTAuth\Contracts\JWTSubject;

class Account extends Authenticatable implements JWTSubject
{
    use Notifiable;

    protected $fillable = [
        'name',
        'twitter_id',
        'email',
        'password',
        'logged_in_at',
        'signed_up_at',
    ];

    protected $hidden = [
        'password',
        'remember_token'
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function getJWTIdentifier()
    {
        return $this->getKey();
    }

    public function getJWTCustomClaims()
    {
        return [];
    }

    public function followers()
    {
        return $this->hasMany(Follower::class);
    }

    public function follower()
    {
        return $this->hasOne(Follower::class)
                    ->where('follower_account_id', auth()->user()->id);
    }
}
