<?php

namespace App\Repositories;

use App\Models\Contact;

class ContactRepository extends Repository
{
    public function model()
    {
        return Contact::class;
    }
}
