<?php

namespace App\Models;

use App\Enums\CategoryStatus;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Searchable;

class Category extends Model
{
    use HasFactory, Searchable;

    protected $table = 'categories';

    protected $casts = [
        'status' => CategoryStatus::class
    ];

    protected $fillable = ['title', 'cat_id', 'status'];

    public function toSearchableArray()
    {
        return [
            'title' => $this->title,
        ];
    }

    public function subCat()
    {
        return $this->belongsTo(Category::class, 'cat_id', 'id')->withDefault([
            'cat_id' => 'null'
        ]);
    }

    public function cats()
    {
        return $this->hasMany(Category::class, 'cat_id', 'id');
    }

    public function products()
    {
        return $this->hasMany(Product::class, 'category_id', 'id');
    }
}
