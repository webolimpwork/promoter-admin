<?php

namespace App\Mappers;

use App\Enums\PermissionEnum;
use App\Enums\RoleEnum;
use App\Models\Role;

class RolePermissionsMapper
{
    /**
     * Карта прав по ролям
     */
    private static array $map = [
        RoleEnum::ROOT->value => [
            PermissionEnum::CAN_MANAGE_ALL_PROJECTS,
            PermissionEnum::CAN_SEE_ALL_EVENTS,
            PermissionEnum::CAN_MANAGE_ALL_USERS
        ],

        RoleEnum::ADMIN->value => [
            PermissionEnum::CAN_SEE_ALL_EVENTS
        ],

        RoleEnum::SUPERVISOR->value => [
            //
        ],

        RoleEnum::PROMOTER->value => [
            //
        ]
    ];

    /**
     * Получить список прав для роли
     */
    public static function getPermissionsForRole(Role|string $role): array
    {
        $roleName = $role instanceof Role
            ? $role->slug
            : $role;

        return self::$map[$roleName] ?? [];
    }

    /**
     * Проверить право для роли
     */
    public static function roleHasPermission(Role|string $role, PermissionEnum $permission): bool
    {
        return in_array($permission, self::getPermissionsForRole($role), true);
    }
}
