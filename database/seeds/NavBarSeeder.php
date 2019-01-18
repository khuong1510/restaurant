<?php

use Illuminate\Database\Seeder;

class NavBarSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('navbar')->insert([
            [
                'name' => 'User',
                'link' => '/user',
                'parent_id' => 0,
                'page' => 'admin',
                'created_at' => \Carbon\Carbon::now()
            ],
            [
                'name' => 'Navigation Bar',
                'link' => '/navbar',
                'parent_id' => 0,
                'page' => 'admin',
                'created_at' => \Carbon\Carbon::now()
            ],
            [
                'name' => 'Config',
                'link' => '/config',
                'parent_id' => 0,
                'page' => 'admin',
                'created_at' => \Carbon\Carbon::now()
            ],
        ]);
    }
}
