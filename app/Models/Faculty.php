<?php

namespace App\Models;

use Eloquent;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Carbon;

/**
 * App\Models\Faculty
 *
 * @property int $id
 * @property string $title
 * @property string $short_title
 * @property string $slug
 * @property-read Collection|Book[] $books
 * @property-read int|null $books_count
 * @method static Builder|Faculty newModelQuery()
 * @method static Builder|Faculty newQuery()
 * @method static Builder|Faculty query()
 * @method static Builder|Faculty whereId($value)
 * @method static Builder|Faculty whereShortTitle($value)
 * @method static Builder|Faculty whereSlug($value)
 * @method static Builder|Faculty whereTitle($value)
 * @property Carbon|null $deleted_at
 * @method static Builder|Faculty onlyTrashed()
 * @method static Builder|Faculty whereDeletedAt($value)
 * @method static Builder|Faculty withTrashed()
 * @method static Builder|Faculty withoutTrashed()
 * @mixin Eloquent
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

    /**
     * @return HasMany
     */
    public function books(): HasMany
    {
        return $this->hasMany(Book::class);
    }
}
