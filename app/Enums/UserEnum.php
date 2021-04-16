<?php

namespace App\Enums;

final class UserEnum
{
    const NORMAL_USER = 1;
    const ADMIN_USER = 2;
    
    protected static function UserType(): array
    {
        return [
            'admin_user' => 2,
            'normal_user' => 1,
        ];
    }
}
