<?php

use Illuminate\Database\Seeder;

class MenuTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('menu')->insert([
            [
                'name' => 'Breakfast',
                'description' => 'Dishes for breakfast',
                'active' => 1,
                'icon' => '<i class="glyph-icon flaticon-hot-mug-doodle"></i>',
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now()
            ],
            [
                'name' => 'Lunch',
                'description' => 'Dishes for lunch',
                'active' => 1,
                'icon' => '<i class="glyph-icon flaticon-food-36"></i>',
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now()
            ],
            [
                'name' => 'Dinner',
                'description' => 'Dishes for dinner',
                'active' => 1,
                'icon' => '<i class="glyph-icon flaticon-food-9"></i>',
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now()
            ],
            [
                'name' => 'Drinks',
                'description' => 'Drinks menu',
                'active' => 1,
                'icon' => '<i class="glyph-icon flaticon-foamy-beer-jar"></i>',
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now()
            ],
        ]);
    }
}
