<?php

namespace App\Models;

use App\Enums\BookMonthEnum;
use App\Enums\BookStatusesEnum;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

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
        'status' => BookStatusesEnum::class,
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

    /**
     * @return Attribute
     */
    protected function month(): Attribute
    {
        return Attribute::make(
            get: fn() => $this->month_id->label(),
        );
    }
}
