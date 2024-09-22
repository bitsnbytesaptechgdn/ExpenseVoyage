<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Expense extends Model
{
    use HasFactory;

    protected $fillable = ['trip_id', 'itinerary_id', 'note', 'amount'];

    // Relation with Trip
    public function trip()
    {
        return $this->belongsTo(Trip::class);
    }

    public function itinerary()
    {
        return $this->belongsTo(Itinerary::class, 'itinerary_id');
    }
}
