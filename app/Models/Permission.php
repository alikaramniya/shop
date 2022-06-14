<?php

namespace App\Models;

use App\Enums\PermissionStatus;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Permission extends Model
{
    use HasFactory;

    protected $table = 'permissions';

    protected $casts = [
        'status' => PermissionStatus::class
    ];

    protected $fillable = ['title', 'persian_title', 'status'];

    /**
     * Get all of the roles for the user
     */
    public function roles()
    {
        return $this->morphToMany(Role::class, 'rollable', 'rollables');
    }
}
