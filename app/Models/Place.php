<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * @property int $id
 * @property int $city_id
 * @property string $name
 * @property City $city
 */
class Place extends Model
{
    /**
     * @var string
     */
    protected $table = 'places';

    /**
     * @var string[]
     */
    protected $fillable = [
        'name',
        'city_id'
    ];

    /**
     * @var bool
     */
    public $timestamps = false;

    /**
     * Город места проведения.
     *
     * @return BelongsTo
     */
    public function city(): BelongsTo
    {
        return $this->belongsTo(related: City::class, foreignKey: 'city_id');
    }
}
