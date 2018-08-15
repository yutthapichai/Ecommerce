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
        App\User::create([
          'name' => 'yutth dev',
          'email' => 'admin@gmail.com',
          'password' => bcrypt('123456')
        ]);
    }
}