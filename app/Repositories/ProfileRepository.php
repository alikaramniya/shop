<?php

namespace App\Repositories;

use App\Models\Profile;

class ProfileRepository extends Repository
{
    public function model()
    {
        return Profile::class;
    }
}
