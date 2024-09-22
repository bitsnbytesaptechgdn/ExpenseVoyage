<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Budget extends Model
{
    use HasFactory;

    protected $fillable = [
        'trip_id', 'category_id', 'amount'
    ];

    public function trip()
    {
        return $this->belongsTo(Trip::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
