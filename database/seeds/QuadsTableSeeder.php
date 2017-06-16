<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use App\Quad;

class QuadsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();

        foreach (range(1, 50) as $index) {
            $quad = new Quad();
            $quad->user_id = $faker->numberBetween(1, 4);
            $quad->title = $faker->text($faker->numberBetween(50, 255));
            $quad->body = $faker->paragraph(12, true);
            $quad->save();
        }
    }
}
