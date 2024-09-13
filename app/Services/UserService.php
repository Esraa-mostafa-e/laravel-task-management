<?php

namespace App\Services;

use App\Models\User;

class UserService extends BaseService
{
    /**
     * Return model instance.
     *
     * @return string
     */
    public function model(): string
    {
        return User::class;
    }
}
