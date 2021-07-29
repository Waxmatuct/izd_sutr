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
        'month_id',
        'handed_in',
        'status',
    ];

    public function faculty() {
        return $this->belongsTo(Faculty::class);
    }

    public function type() {
        return $this->belongsTo(Type::class);
    }

    public function month() {
        return $this->belongsTo(Month::class);
    }
}
