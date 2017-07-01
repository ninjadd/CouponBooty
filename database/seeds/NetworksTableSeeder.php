<?php

use Illuminate\Database\Seeder;
use App\Network;

class NetworksTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Network::create(['name' => 'CommissionJunction']);
        Network::create(['name' => 'ShareaSale']);
        Network::create(['name' => 'LinkShare']);
    }
}
