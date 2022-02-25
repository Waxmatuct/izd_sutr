<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * App\Models\Book
 *
 * @property int $id
 * @property int $item
 * @property string $title
 * @property int $faculty_id
 * @property string $author
 * @property int $type_id
 * @property string|null $disciple
 * @property float $size
 * @property int $amount
 * @property string $year
 * @property int $month_id
 * @property string|null $handed_in
 * @property int $is_handed
 * @property string|null $status
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property string|null $deleted_at
 * @property-read \App\Models\Faculty $faculty
 * @property-read \App\Models\Month $month
 * @property-read \App\Models\Type $type
 * @method static \Database\Factories\BookFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|Book newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Book newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Book query()
 * @method static \Illuminate\Database\Eloquent\Builder|Book whereAmount($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Book whereAuthor($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Book whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Book whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Book whereDisciple($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Book whereFacultyId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Book whereHandedIn($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Book whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Book whereIsHanded($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Book whereItem($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Book whereMonthId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Book whereSize($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Book whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Book whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Book whereTypeId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Book whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Book whereYear($value)
 * @mixin \Eloquent
 */
class Book extends Model
{
    use HasFactory, SoftDeletes;

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
        'is_handed',
        'status',
    ];

    public function faculty()
    {
        return $this->belongsTo(Faculty::class)->withTrashed();
    }

    public function type()
    {
        return $this->belongsTo(Type::class);
    }

    public function month()
    {
        return $this->belongsTo(Month::class);
    }

}
