<?php

use Illuminate\Database\Seeder;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories = ['admin', 'parent', 'teacher'];

        foreach ($categories as $value):
            DB::table('categories')->insert(['description' => $value]);
        endforeach;
    }
}
