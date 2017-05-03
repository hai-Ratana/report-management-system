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
            'firstname' => 'Ratana',
            'lastname' => 'Hai',
            'email' => 'hairatana@gmail.com',
            'role' => 1,
            'password' => bcrypt('1234'),
        ]);
    }
}
