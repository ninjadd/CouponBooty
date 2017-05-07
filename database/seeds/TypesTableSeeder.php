<?php

use Illuminate\Database\Seeder;
use App\Type;

class TypesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $type = new Type();
        $type->create(['label' => 'BOGO']);
        $type->create(['label' => '$ Off']);
        $type->create(['label' => '% Off']);
        $type->create(['label' => 'Free Shipping']);
    }
}
