<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property string $name
 * @property boolean $status
 */
class EventCategory extends Model
{
    /**
     * @var string
     */
    protected $table = 'event_categories';

    /**
     * @var string[]
     */
    protected $fillable = [
        'name',
        'league_name',
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
        'status' => 'boolean'
    ];
}
