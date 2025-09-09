<?php

namespace App\Policies;

use App\Models\User;

class UserPolicy
{
    /**
     * Может управлять пользователем
     *
     * @var User $currentUser - текущий авторизованный пользователь, выполняющий действие
     * @var User $user - редактируемый/просматриваемый пользователь
     * @return bool
     */
    public function manage(User $currentUser, User $user): bool
    {
        // Если имеем роль рута
        if ($currentUser->isRoot()) {
            return true;
        }

        // Если роль админ и оба пользователя принадлежат одному проекту
        if (
            $currentUser->isAdmin() &&
            $currentUser->project_id === $user->project_id
        ) {
            return true;
        }

        // Если роль супервайзер и редактируемый пользователь с ролью промоутер
        // (+ оба принадлежат одному проекту)
        if (
            $currentUser->isSupervisor() &&
            $user->isPromoter() &&
            $currentUser->project_id === $user->project_id
        ) {
            return true;
        }

        // В остальных случаях запрещаем
        return false;
    }
}
