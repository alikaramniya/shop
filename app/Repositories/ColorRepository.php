<?php

namespace App\Repositories;

use App\Models\Color;

class ColorRepository extends Repository
{
    public function model() {
        return Color::class;
    }
}

?>
