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
    public function manage(User $user, Project $project): bool
    {
        // Если имеем роль рута
        if ($user->isRoot()) {
            return true;
        }

        return $user->project_id === $project->id;
    }
}
