<?php

namespace App\Models;

use App\Enums\{
    CommentStatus,
    CommentRead
};
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comments extends Model
{
    use HasFactory;

    protected $casts = [
        'status' => CommentStatus::class,
        'read' => CommentRead::class
    ];
}
