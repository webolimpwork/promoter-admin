<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Carbon;

/**
 * @property int $id
 * @property Carbon $start_date
 * @property Carbon $end_date
 * @property int $city_id
 * @property int $place_id
 * @property string $name
 * @property int $category_id
 * @property int $project_id
 * @property string $match_id
 * @property string|null $sponsor_club
 * @property boolean $status
 * @property EventCategory $category
 * @property Place $place
 * @property City $city
 * @property Project $project
 * @property Collection<int, EventCondition> $conditions
 * @property Collection<int, User> $users
 */
class Event extends Model
{
    /**
     * @var string
     */
    protected $table = 'events';

    /**
     * @var string[]
     */
    protected $fillable = [
        'start_date',
        'end_date',
        'city_id',
        'place_id',
        'name',
        'category_id',
        'project_id',
        'match_id',
        'sponsor_club',
        'status'
    ];

    /**
     * @var bool
     */
    public $timestamps = false;

    /**
     * @var string[]
     */
    protected $casts = [
        'start_date' => 'datetime',
        'end_date' => 'datetime',
        'status' => 'boolean',
    ];

    /**
     * Город события.
     *
     * @return BelongsTo
     */
    public function city(): BelongsTo
    {
        return $this->belongsTo(related: City::class, foreignKey: 'city_id');
    }

    /**
     * Категория события
     *
     * @return BelongsTo
     */
    public function category(): BelongsTo
    {
        return $this->belongsTo(related: EventCategory::class, foreignKey: 'category_id');
    }

    /**
     * Место проведения.
     *
     * @return BelongsTo
     */
    public function place(): BelongsTo
    {
        return $this->belongsTo(related: Place::class, foreignKey: 'place_id');
    }

    /**
     * Условия события.
     *
     * @return HasMany
     */
    public function conditions(): HasMany
    {
        return $this->hasMany(related: EventCondition::class, foreignKey: 'event_id');
    }

    /**
     * @return BelongsTo
     */
    public function project(): BelongsTo
    {
        return $this->belongsTo(related: Project::class, foreignKey: 'project_id');
    }

    /**
     * @return BelongsToMany
     */
    public function users(): BelongsToMany
    {
        return $this->belongsToMany(related: User::class, table: 'user_event');
    }
}
