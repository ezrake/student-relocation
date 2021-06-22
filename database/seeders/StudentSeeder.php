<?php

namespace Database\Seeders;

use App\Models\Area;
use App\Models\Location;
use App\Models\Role;
use App\Models\Student;
use Illuminate\Database\Seeder;

class StudentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role = Role::factory()->create();
        $areas = Area::factory()->count(10)->create();

        foreach ($areas as $area) {
            $locations = Location::factory()
                ->count(3)
                ->for($area)
                ->create();

            foreach ($locations as $location) {
                Student::factory()->count(15)
                    ->for($location)
                    ->create();
            }
        }
    }
}
