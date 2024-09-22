<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Itinerary extends Model
{
    use HasFactory;

    protected $fillable = [
        'trip_id',
        'category_id',
        'name',
        'budget',
    ];

    // Define the relationship with the Trip model
    public function trip()
    {
        return $this->belongsTo(Trip::class);
    }

    // Define the relationship with the Category model
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    // Define the relationship with the Expense model
    public function expenses()
    {
        return $this->hasMany(Expense::class);
    }
}
