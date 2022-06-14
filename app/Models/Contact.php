<?php

namespace App\Models;

use App\Enums\ContactState;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    use HasFactory;

    protected $casts = [
        'state' => ContactState::class
    ];

    protected $fillable = [
        'name', 'email', 'subject',
        'website', 'message'
    ];
}
