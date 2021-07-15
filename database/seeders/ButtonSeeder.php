<?php

namespace Database\Seeders;

use App\Models\Color;
use App\Models\Button;
use Illuminate\Database\Seeder;

class ButtonSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $default = Color::where('name', 'DEFAULT')->first();
        $button = [
            'title' => '',
            'link' => '',
            'color_id' => $default->id
        ];

        for ($counter = 0; $counter < 9; $counter++) {
            Button::insert($button);
        }
    }
}
