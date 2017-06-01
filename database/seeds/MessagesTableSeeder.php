<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use App\Message;

class MessagesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();

        foreach (range(1, 100) as $index) {
            $message = new Message();
            $message->contact_id = $faker->numberBetween(1, 10);
            $message->body = $faker->paragraph(7, true);
            $message->save();
        }
    }
}
