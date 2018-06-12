<?php

use Illuminate\Database\Seeder;

class ConversationTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */

    public function run()
    {
        DB::table('conversations')->insert([
            'name' => 'Benoit Quentin',
        ]);

        DB::table('conversations')->insert([
            'name' => 'Benoit Olivier',
        ]);

        DB::table('conversations')->insert([
            'name' => 'Benoit Olivier Quentin',
        ]);
    }
}
