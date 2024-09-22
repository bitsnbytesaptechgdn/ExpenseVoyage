<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    use HasFactory;
    // In App\Models\Contact.php
protected $fillable = ['name', 'email', 'subject', 'message'];

}
