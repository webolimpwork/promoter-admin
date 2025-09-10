<?php

namespace App\Policies;

use App\Models\Event;
use App\Models\User;

class EventPolicy
{
    /**
     * Может просматривать событие.
     *
     * @param User $user
     * @param Event $event
     * @return bool
     */
    public static function show(User $user, Event $event): bool
    {
        // Если имеем роль рута
        if ($user->isRoot()) {
            return true;
        }

        if ($user->isAdmin() && $event->project_id === $user->project_id) {
            return true;
        }

        // todo if user is supervisor

        return false;
    }
}
