<?php

namespace App\Models;

use Illuminate\Support\Str;
use App\Enums\RoleStatus;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    use HasFactory;

    protected $table = 'roles';

    protected $fillable = ['title', 'status', 'persian_title'];

    protected $casts = [
        'status' => RoleStatus::class
    ];

    /**
     * Get all of the permissions that are assigned this role
     */
    public function permissions()
    {
        return $this->morphedByMany(Permission::class, 'rollable', 'rollables');
    }

    /**
     * Get all of the users that are assigned this role 
     */
    public function users()
    {
        return $this->morphedByMany(User::class, 'rollable', 'rollables');
    }

    public function title(): Attribute
    {
        return Attribute::make(
            get: fn ($title) => request()->path() != 'admin/roles/list'
                ? Str::replace('_', ' ', $title)
                : $this->attributes['title'],
            set: fn ($title) => Str::replace(' ', '_', trim($title)),
        );
    }
}
