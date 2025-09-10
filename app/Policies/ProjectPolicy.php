<?php

namespace App\Policies;

use App\Models\Project;
use App\Models\User;

class ProjectPolicy
{
    /**
     * Может управлять проектом
     *
     * @param User $user
     * @param Project $project
     * @return bool
     */
    public static function manage(User $user, Project $project): bool
    {
        // Если имеем роль рута
        if ($user->isRoot()) {
            return true;
        }

        return false;
    }
}
