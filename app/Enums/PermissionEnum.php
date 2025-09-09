<?php

namespace App\Enums;

enum PermissionEnum: string
{
    case CAN_MANAGE_ALL_PROJECTS = 'can_manage_projects';

    case CAN_SEE_ALL_EVENTS = 'can_see_all_events';

    case CAN_MANAGE_ALL_USERS = 'can_manage_users';

}
