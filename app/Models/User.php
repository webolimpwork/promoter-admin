<?php

namespace App\Models;

use App\Enums\RoleEnum;
use Database\Factories\UserFactory;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Foundation\Auth\User as Authenticatable;

/**
 * @property int $id
 * @property string $name
 * @property string $email
 * @property string $phone
 * @property string $password
 * @property int|null $role_id
 * @property int|null $project_id
 * @property boolean $status
 * @property Role $role
 * @property Project $project
 * @property Collection<int, City> $cities
 * @property Collection<int, Event> $events
 */
class User extends Authenticatable
{
    /**
     * @use HasFactory<UserFactory>
     */
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'name',
        'email',
        'phone',
        'role_id',
        'project_id',
        'password',
        'status'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
            'status' => 'boolean',
        ];
    }

    /**
     * Является ли пользователь рутом
     *
     * @return bool
     */
    public function isRoot(): bool
    {
        return $this?->role?->slug === RoleEnum::ROOT->value;
    }

    /**
     * Является ли пользователь админом
     *
     * @return bool
     */
    public function isAdmin(): bool
    {
        return $this?->role?->slug === RoleEnum::ADMIN->value;
    }

    /**
     * Является ли пользователь супервизором
     *
     * @return bool
     */
    public function isSupervisor(): bool
    {
        return $this?->role?->slug === RoleEnum::SUPERVISOR->value;
    }

    /**
     * Является ли пользователь промоутером
     *
     * @return bool
     */
    public function isPromoter(): bool
    {
        return $this?->role?->slug === RoleEnum::PROMOTER->value;
    }

    /**
     * @return BelongsTo
     */
    public function role(): BelongsTo
    {
        return $this->belongsTo(related: Role::class);
    }

    /**
     * @return BelongsTo
     */
    public function project(): BelongsTo
    {
        return $this->belongsTo(related: Project::class);
    }

    /**
     * @return BelongsToMany
     */
    public function cities(): BelongsToMany
    {
        return $this->belongsToMany(related: City::class, table: 'user_city');
    }

    /**
     * @return BelongsToMany
     */
    public function events(): BelongsToMany
    {
        return $this->belongsToMany(related: Event::class, table: 'user_event');
    }
}
