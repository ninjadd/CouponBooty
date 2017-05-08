<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use App\Category;
use App\Offer;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();

        $offers = Offer::all();

        foreach ($offers as $offer) {
            foreach (range(1, 5) as $index) {
                $category = new Category();
                $category->offer_id = $offer->id;
                $category->name = $faker->word();
                $category->save();
            }
        }
    }
}
