<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Arr;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Category::truncate();

        Category::factory(10)->create(['cat_id' => 0]);

        // Because create 10 fake category
        $categoryIds = range(1, 10);

        collect()
            ->range(1, 20)
            ->each(function($item) use ($categoryIds){
                Category::factory(1)
                    ->create([
                        'cat_id' => Arr::random($categoryIds)
                    ]);
            });
    }
}
