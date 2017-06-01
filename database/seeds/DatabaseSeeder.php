<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         $this->call(UsersTableSeeder::class);
         $this->call(TypesTableSeeder::class);
         $this->call(OffersTableSeeder::class);
         $this->call(CategoriesTableSeeder::class);
         $this->call(BlogsTableSeeder::class);
         $this->call(BlogCommentsTableSeeder::class);
         $this->call(ContactsTableSeeder::class);
         $this->call(MessagesTableSeeder::class);
    }
}
