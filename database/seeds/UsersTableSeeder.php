<?php

use Illuminate\Database\Seeder;
use App\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = new User();
        $user->create(['name' => 'Daniel Dickson', 'email' => 'ninjadd@gmail.com', 'password' => bcrypt('6891ninja')]);
        $user->create(['name' => 'Chelsea Hoffman', 'email' => 'chelsea@hoffman.com', 'password' => bcrypt('Chelsea Hoffman')]);
        $user->create(['name' => 'Jessica Brown', 'email' => 'jessica@brown.com', 'password' => bcrypt('Jessica Brown')]);
    }
}
