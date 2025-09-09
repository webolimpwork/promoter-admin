<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * @property int $id
 * @property string|null $image
 * @property string $name
 * @property string|null $sku
 * @property int $category_id
 * @property int $project_id
 * @property array $dimensions
 * @property boolean $status
 * @property GiftCategory $category
 */
class Gift extends Model
{
    /**
     * @var string
     */
    protected $table = 'gifts';

    /**
     * @var string[]
     */
    protected $fillable = [
        'image',
        'name',
        'sku',
        'category_id',
        'dimensions',
        'status',
    ];

    /**
     * @var bool
     */
    public $timestamps = false;

    /**
     * @var string[]
     */
    protected $casts = [
        'dimensions' => 'array',
        'status' => 'boolean',
    ];

    /**
     * @return BelongsTo
     */
    public function category(): BelongsTo
    {
        return $this->belongsTo(GiftCategory::class, 'category_id');
    }
}
