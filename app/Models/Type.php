<?php

namespace App\Models;

use Eloquent;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * App\Models\Type
 *
 * @property int $id
 * @property string $title
 * @property-read Collection|Book[] $books
 * @property-read int|null $books_count
 * @method static Builder|Type newModelQuery()
 * @method static Builder|Type newQuery()
 * @method static Builder|Type query()
 * @method static Builder|Type whereId($value)
 * @method static Builder|Type whereTitle($value)
 * @mixin Eloquent
 */
class Type extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
    ];

    public function books(): HasMany
    {
        return $this->hasMany(Book::class);
    }
}
