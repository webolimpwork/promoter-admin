<?php

namespace App\Policies;

use App\Enums\PermissionEnum;
use App\Enums\RoleEnum;
use App\Models\Project;
use App\Models\User;

class ProjectPolicy
{
    public function view(User $user, Project $project): bool
    {
        // Если имеем роль рута
        if ($user->role->slug === RoleEnum::ROOT->value) {
            return true;
        }

        return false;

        // Если имеем роль админа
       /// return $user->id === $post->user_id;
    }
}
