<?php

namespace App\Models;

use App\Enums\EventConditionEnum;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

/**
 * @property int $id
 * @property EventConditionEnum $type
 * @property int $event_id
 * @property array|null $data
 * @property Collection<int, Gift> $gifts
 */
class EventCondition extends Model
{
    /**
     * @var string
     */
    protected $table = 'event_conditions';

    /**
     * @var string[]
     */
    protected $fillable = [
        'type',
        'event_id',
        'data',
    ];

    /**
     * @var bool
     */
    public $timestamps = false;

    /**
     * @return string[]
     */
    protected function casts(): array
    {
        return [
            'type' => EventConditionEnum::class,
            'data' => 'array',
        ];
    }

    /**
     * @return BelongsToMany
     */
    public function gifts(): BelongsToMany
    {
        return $this->belongsToMany(
            related: Gift::class,
            table: 'event_condition_gift',
            foreignPivotKey: 'condition_id'
        );
    }
}
