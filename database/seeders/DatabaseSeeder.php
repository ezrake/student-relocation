<?php

namespace Database\Seeders;

use App\Models\RoomExchange;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            StudentSeeder::class,
            RentalSeeder::class,
            RoomExchange::class
        ]);
    }
}
