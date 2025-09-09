<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * @property int $id
 * @property string $name
 * @property boolean $status
 * @property Collection<int, Place> $places
 */
class City extends Model
{
    /**
     * @var string
     */
    protected $table = 'cities';

    /**
     * @var string[]
     */
    protected $fillable = [
        'name',
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
        'status' => 'boolean',
    ];

    /**
     * @return HasMany
     */
    public function places(): HasMany
    {
        return $this->hasMany(related: Place::class);
    }
}
