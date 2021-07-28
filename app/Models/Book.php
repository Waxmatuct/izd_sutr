<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;

    protected $fillable = [
        'item',
        'title',
        'faculty_id',
        'author',
        'type_id',
        'disciple',
        'size',
        'amount',
        'year',
        'month',
        'handed_in',
        'status',
    ];
}
