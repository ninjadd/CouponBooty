<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use App\Contact;

class ContactsTableSeeder extends Seeder
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
            $contact = new Contact();
            $contact->name = $faker->name();
            $contact->email = $faker->email();
            $contact->save();
        }
    }
}
