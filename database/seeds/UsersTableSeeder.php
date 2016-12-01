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
            'email'       => Config::get('auth.admin.email'),
            'password'    => bcrypt(Config::get('auth.admin.password')),
            'category_id' => Category::where('description', 'admin')->first()->id,
          ]);
    }
}
