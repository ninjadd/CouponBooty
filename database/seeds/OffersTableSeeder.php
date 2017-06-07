<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use App\Offer;

class OffersTableSeeder extends Seeder
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
            $offer = new Offer();
            $offer->user_id = $faker->numberBetween(1, 3);
            $offer->type_id = $faker->numberBetween(1, 4);
            $offer->title = $faker->sentence(4, false);
            $offer->url = $faker->url();
            $offer->image_url = $faker->imageUrl(300, 300);
            $offer->body = $faker->paragraph(12, true);
            $offer->coupon = $faker->optional()->word();
            $offer->save();
        }
    }
}
