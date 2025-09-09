<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property string $slug
 */
class Role extends Model
{
    /**
     * Table name
     *
     * @var string
     */
    protected $table = 'roles';

    /**
     * Use timestamps
     *
     * @var bool
     */
    public $timestamps = false;

    /**
     * Available fields to fill
     *
     * @var string[]
     */
    protected $fillable = [
        'slug'
    ];
}
