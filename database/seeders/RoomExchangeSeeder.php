<?php

namespace Database\Seeders;

use App\Models\RoomExchange;
use Illuminate\Database\Seeder;

class RoomExchangeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        RoomExchange::factory()->count(25)->create();
    }
}
