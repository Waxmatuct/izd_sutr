<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Faculty extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'short_title',
        'slug',
    ];

    public function books() {
        return $this->hasMany(Book::class);
    }
}
