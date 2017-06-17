<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use App\Store;

class StoresTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();

        foreach (range(1, 10) as $index) {
            $store = new Store();
            $store->user_id = $faker->numberBetween(1, 4);
            $name = $faker->sentence(3, true);
            $store->name = $name;
            $store->slug = str_slug($name);
            $store->title = $faker->sentence(3);
            $store->body = $faker->paragraph(3, true);
            $store->save();
        }
    }
}
