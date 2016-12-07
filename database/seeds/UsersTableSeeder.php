<?php

use Manija\Category;
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
            'name'        => Config::get('auth.admin.name'),
            'lastName'    => Config::get('auth.admin.lastName'),
            'email'       => Config::get('auth.admin.email'),
            'password'    => bcrypt(Config::get('auth.admin.password')),
            'category_id' => Category::where('description', 'admin')->first()->id,
          ]);
          DB::table('users')->insert([
            'name'        => 'First',
            'lastName'    => 'User',
            'email'       => 'testone@manija.com',
            'password'    => bcrypt('123456'),
            'category_id' => Category::where('description', 'teacher')->first()->id,
          ]);
          DB::table('users')->insert([
            'name'        => 'Second',
            'lastName'    => 'User',
            'email'       => 'testtwo@manija.com',
            'password'    => bcrypt('123456'),
            'category_id' => Category::where('description', 'parent')->first()->id,
          ]);
    }
}
