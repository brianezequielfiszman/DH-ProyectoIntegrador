<?php

use Illuminate\Database\Seeder;

class MessagesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      for ($i=0; $i < 30; $i++) {
        $message = DB::table('messages')->insert([
          'user_origin_id'           => 2,
          'user_recipient_id'        => 3,
          'message'      => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.',
          'created_at'              => \Carbon\Carbon::now(),
          'updated_at'              => \Carbon\Carbon::now()
        ]);
        $message = DB::table('messages')->insert([
          'user_origin_id'           => 3,
          'user_recipient_id'        => 2,
          'message'      => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.',
          'created_at'              => \Carbon\Carbon::now(),
          'updated_at'              => \Carbon\Carbon::now()
        ]);
      }
    }
}
