<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * App\Models\ElectronicEdition
 *
 * @property int $id
 * @property string $title
 * @property string $author
 * @property int $type_id
 * @property string|null $registration_number
 * @property string|null $resource_type
 * @property string|null $distribution_type
 * @property string|null $isbn
 * @property int|null $amount
 * @property string $size
 * @property string $year
 * @property \Illuminate\Support\Carbon|null $registered_at
 * @property string|null $cover_url
 * @property string|null $annotation
 * @property string|null $bibliographic_description
 * @property string|null $system_requirements
 * @property string|null $download_link
 * @property-read \App\Models\Type $type
 * @method static \Illuminate\Database\Eloquent\Builder|ElectronicEdition newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ElectronicEdition newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ElectronicEdition query()
 * @method static \Illuminate\Database\Eloquent\Builder|ElectronicEdition whereAmount($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ElectronicEdition whereAnnotation($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ElectronicEdition whereAuthor($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ElectronicEdition whereBibliographicDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ElectronicEdition whereCoverUrl($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ElectronicEdition whereDistributionType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ElectronicEdition whereDownloadLink($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ElectronicEdition whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ElectronicEdition whereIsbn($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ElectronicEdition whereRegisteredAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ElectronicEdition whereRegistrationNumber($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ElectronicEdition whereResourceType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ElectronicEdition whereSize($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ElectronicEdition whereSystemRequirements($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ElectronicEdition whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ElectronicEdition whereTypeId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ElectronicEdition whereYear($value)
 * @mixin \Eloquent
 */
class ElectronicEdition extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = [
        'title',
        'author',
        'type_id',
        'registration_number',
        'resource_type',
        'distribution_type',
        'isbn',
        'amount',
        'size',
        'year',
        'registered_at',
        'cover_url',
        'annotation',
        'bibliographic_description',
        'system_requirements',
        'download_link',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'registered_at' => 'datetime',
    ];

    /**
     * @return BelongsTo
     */
    public function type(): BelongsTo
    {
        return $this->belongsTo(Type::class);
    }
}
