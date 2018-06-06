<?php

use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */

    public function run()
    {
        DB::table('users')->insert([
            'name' => 'Benoit',
            'email' => 'benoitzuing@msn.com',
            'password' => bcrypt('secret'),
        ]);
        DB::table('users')->insert([
            'name' => 'Olivier',
            'email' => 'olivier.charles@gmail.com',
            'password' => bcrypt('secret'),
        ]);
        DB::table('users')->insert([
            'name' => 'Bowz',
            'email' => 'quentin.duteil@gmail.com',
            'password' => bcrypt('bobowz'),
        ]);
    }
}
