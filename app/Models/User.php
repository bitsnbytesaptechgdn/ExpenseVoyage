<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $fillable = [
        'name',
        'email',
        'image',
        'password',
        'role',
        'subscription_id',
        'currency'
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
        'role' => 'string',
        'currency' => 'string',
    ];

    public function subscription()
    {
        return $this->belongsTo(Subscription::class);
    }

    public function trips()
    {
        return $this->hasMany(Trip::class);
    }

    public function sharedTrips()
    {
        return $this->belongsToMany(Trip::class, 'trip_user')->withPivot('role');
    }
}
