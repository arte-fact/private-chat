<?php

use Illuminate\Database\Seeder;

class UserConversationTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */

    public function run()
    {
        DB::table('user_conversations')->insert([
            'user_id' => 1,
            'conversation_id' => 1,
        ]);

        DB::table('user_conversations')->insert([
            'user_id' => 3,
            'conversation_id' => 1,
        ]);

        DB::table('user_conversations')->insert([
            'user_id' => 1,
            'conversation_id' => 2,
        ]);

        DB::table('user_conversations')->insert([
            'user_id' => 2,
            'conversation_id' => 2,
        ]);

        DB::table('user_conversations')->insert([
            'user_id' => 1,
            'conversation_id' => 3,
        ]);

        DB::table('user_conversations')->insert([
            'user_id' => 2,
            'conversation_id' => 3,
        ]);

        DB::table('user_conversations')->insert([
            'user_id' => 3,
            'conversation_id' => 3,
        ]);
    }
}
