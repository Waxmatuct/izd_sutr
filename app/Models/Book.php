<?php

namespace App\Models;

use App\Enums\BookMonthEnum;
use App\Enums\MonthEnum;
use App\Helpers\Helpers;
use Database\Factories\BookFactory;
use Eloquent;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Carbon;

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
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property string|null $deleted_at
 * @property-read Faculty $faculty
 * @property-read Month $month
 * @property-read Type $type
 * @method static BookFactory factory(...$parameters)
 * @method static Builder|Book newModelQuery()
 * @method static Builder|Book newQuery()
 * @method static Builder|Book query()
 * @method static Builder|Book whereAmount($value)
 * @method static Builder|Book whereAuthor($value)
 * @method static Builder|Book whereCreatedAt($value)
 * @method static Builder|Book whereDeletedAt($value)
 * @method static Builder|Book whereDisciple($value)
 * @method static Builder|Book whereFacultyId($value)
 * @method static Builder|Book whereHandedIn($value)
 * @method static Builder|Book whereId($value)
 * @method static Builder|Book whereIsHanded($value)
 * @method static Builder|Book whereItem($value)
 * @method static Builder|Book whereMonthId($value)
 * @method static Builder|Book whereSize($value)
 * @method static Builder|Book whereStatus($value)
 * @method static Builder|Book whereTitle($value)
 * @method static Builder|Book whereTypeId($value)
 * @method static Builder|Book whereUpdatedAt($value)
 * @method static Builder|Book whereYear($value)
 * @method static Builder|Book onlyTrashed()
 * @method static Builder|Book withTrashed()
 * @method static Builder|Book withoutTrashed()
 * @mixin Eloquent
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
        'month',
        'month_id',
        'handed_in',
        'is_handed',
        'status',
    ];

    protected $casts = [
        'is_handed' => 'boolean',
        'month_id' => BookMonthEnum::class,
        'year' => 'integer',
    ];

    protected $appends = ['month'];

    /**
     * @return mixed
     */
    public function faculty(): mixed
    {
        return $this->belongsTo(Faculty::class)->withTrashed();
    }

    /**
     * @return BelongsTo
     */
    public function type(): BelongsTo
    {
        return $this->belongsTo(Type::class);
    }

//    public function month()
//    {
//        return $this->belongsTo(Month::class);
//    }

    /**
     * @return Attribute
     */
    protected function month(): Attribute
    {
        return Attribute::make(
            get: fn() => $this->month_id->label(),
        );
    }

//    protected function monthHanded(): Attribute
//    {
//        return Attribute::make(
//            get: fn() => $this->handed_in->label(),
//        );
//    }

}
