<?php

namespace App\Repositories;

class ProductRepository extends Repository
{
    public function model() {
        return \App\Models\Product::class;
    }
}
