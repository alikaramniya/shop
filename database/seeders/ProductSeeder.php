<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Product::truncate();

        $categoryIds = Category::where('cat_id', '!=', 0)
            ->pluck('id');

        for ($i = 0; $i < 50; $i++) {
            Product::factory(1)->create([
                'category_id' => $categoryIds->random()
            ]);
        }
    }
}
