<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description'
    ];

    public function trip()
    {
        return $this->belongsTo(Trip::class);
    }

    public function itineraries()
    {
        return $this->hasMany(Itinerary::class);
    }

    public function budgets()
    {
        return $this->hasMany(Budget::class);
    }
}
