<?php

namespace Database\Factories;

use App\Models\RoomExchange;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class RoomExchangeFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = RoomExchange::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'first_party_id' => User::factory()->create()->id,
            'second_party_id' => User::factory()->create()->id,
            'room_items' => implode(
                ',',
                $this->faker->words(20)
            )
        ];
    }
}
