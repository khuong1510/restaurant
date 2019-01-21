<?php

use Illuminate\Database\Seeder;

class ConfigTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $configArray = [
            [
                'name' => 'home_name',
                'value' => 'The Zayka',
                'active' => 1
            ],
            [
                'name' => 'home_slider_subtitle',
                'value' => 'Experience the',
                'active' => 1
            ],
            [
                'name' => 'home_slider_title',
                'value' => 'Welcome to our restaurant',
                'active' => 1
            ],
            [
                'name' => 'home_slider_content',
                'value' => 'THE BEST PLACE TO ENJOY SPICY BOILED CRAWFISH',
                'active' => 1
            ],
            [
                'name' => 'home_logo',
                'value' => 'images/homepage/logo.png',
                'active' => 1
            ],
            [
                'name' => 'home_email',
                'value' => 'support@website.com',
                'active' => 1
            ],
            [
                'name' => 'home_phone',
                'value' => '(01) 123 456 7890',
                'active' => 1
            ],
            [
                'name' => 'home_address',
                'value' => '1234 North Avenue Luke, IN 360001',
                'active' => 1
            ],
            [
                'name' => 'home_social_fb',
                'value' => 'https://www.facebook.com',
                'active' => 1
            ],
            [
                'name' => 'home_social_instagram',
                'value' => 'https://www.instagram.com',
                'active' => 1
            ],
            [
                'name' => 'home_social_twitter',
                'value' => 'https://twitter.com',
                'active' => 1
            ],
            [
                'name' => 'menu_list_field',
                'value' => ['name', 'description', 'active'],
                'active' => 1
            ],
            [
                'name' => 'menu_page_size',
                'value' => 5,
                'active' => 1
            ],
        ];
        DB::table('config')->insert($configArray);
    }
}
