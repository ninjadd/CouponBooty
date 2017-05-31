<?php

use Illuminate\Database\Seeder;
use App\BlogComment;
use Faker\Factory as Faker;

class BlogCommentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();

        foreach (range(1, 500) as $index) {
            $blog_comment = new BlogComment();
            $blog_comment->created_at = $faker->dateTimeThisYear();
            $blog_comment->updated_at = $faker->dateTimeThisYear();
            $blog_comment->body = $faker->paragraph(7, true);
            $blog_comment->blog_id = $faker->numberBetween(1, 100);
            $blog_comment->save();
        }
    }
}
