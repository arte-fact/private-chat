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

        $faker = Faker\Factory::create();

        for ($i = 0; $i < 50; $i++) {
            DB::table('messages')->insert([
                'author_id' => rand(1, 3),
                'conversation_id' => 1,
                'message' => $faker->text,
            ]);
        }
    }
}
