<?php

namespace App\Repositories;

use App\Models\Permission;

class PermissionRepository extends Repository
{
    public function model()
    {
        return Permission::class;
    }
}
