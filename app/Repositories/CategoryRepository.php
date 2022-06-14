<?php

namespace App\Repositories;

use App\Models\Category;

class CategoryRepository extends Repository
{
    public function model() {
        return Category::class;
    }

    public function cehckBeforeInsert($data)
    {
        $category = Category::where([]);
    }
}
