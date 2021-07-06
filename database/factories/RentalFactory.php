<?php

namespace Database\Factories;

use App\Models\Location;
use App\Models\Rental;
use Illuminate\Database\Eloquent\Factories\Factory;

class RentalFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Rental::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $locations = Location::all();
        return [
            'location_id' => $this->faker->randomElement($locations),
            'pics_uri' => $this->faker->url(),
            'name' => $this->faker->company(),
            'description' => $this->faker->bs(),
        ];
    }
}
