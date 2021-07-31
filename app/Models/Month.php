<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Month
 *
 * @property int $id
 * @property string $name
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Book[] $books
 * @property-read int|null $books_count
 * @method static \Database\Factories\MonthFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|Month newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Month newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Month query()
 * @method static \Illuminate\Database\Eloquent\Builder|Month whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Month whereName($value)
 * @mixin \Eloquent
 */
class Month extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
    ];

    public function books() {
        return $this->hasMany(Book::class);
    }
}
