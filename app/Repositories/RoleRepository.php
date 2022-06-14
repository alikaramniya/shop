<?php

namespace App\Repositories;

use App\Models\Role;

class RoleRepository extends Repository
{
    public function model()
    {
        return Role::class;
    }
}
