<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * App\Models\Faculty
 *
 * @property int $id
 * @property string $title
 * @property string $short_title
 * @property string $slug
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Book[] $books
 * @property-read int|null $books_count
 * @method static \Illuminate\Database\Eloquent\Builder|Faculty newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Faculty newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Faculty query()
 * @method static \Illuminate\Database\Eloquent\Builder|Faculty whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Faculty whereShortTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Faculty whereSlug($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Faculty whereTitle($value)
 * @mixin \Eloquent
 */
class Faculty extends Model
{
    use HasFactory, SoftDeletes;

    public $timestamps = false;

    protected $fillable = [
        'title',
        'short_title',
        'slug',
    ];

    public function books()
    {
        return $this->hasMany(Book::class);
    }
}
