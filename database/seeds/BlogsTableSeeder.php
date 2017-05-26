<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use App\Blog;

class BlogsTableSeeder extends Seeder
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
            $blog = new Blog();
            $blog->user_id = $faker->numberBetween(1, 3);
            $title = $faker->sentence(5, true);
            $blog->title = $title;
            $blog->title_slug = str_slug($title);
            $blog->body = $faker->paragraph(12, true);
            $blog->archive = $faker->numberBetween(0, 1);
            $blog->save();
        }
    }
}
