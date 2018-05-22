<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'Administrator',
            'username' => 'admin',
            'email' => 'admin_'.str_random(3).'@gmail.com',
            'phone' => '0123456789',
            'gender' => 1,
            'avatar' => '/img_management/user/profile_user.jpg',
            'dob'   => '1995-10-15',
            'active' => 1,
            'password' => bcrypt('12345678')
        ]);
    }
}
