<?php

namespace Database\Seeders;

use App\Models\Color;
use Illuminate\Database\Seeder;

class ColorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $colors = [
            ['name' => 'DEFAULT'],
            ['name' => 'RED'],
            ['name' => 'GREEN'],
            ['name' => 'BLUE'],
            ['name' => 'GREY'],
            ['name' => 'ORANGE'],
            ['name' => 'MAROON'],
            ['name' => 'PINK'],
            ['name' => 'PURPLE'],
            ['name' => 'YELLOW']
        ];
        foreach ($colors as $color) {
            Color::insert($color);
        }
    }
}
