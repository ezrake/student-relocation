<?php

namespace Database\Factories;

use App\Models\Student;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class StudentFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Student::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'user_id' => User::factory()->student(),
            'student_card_uri' => $this->faker->url(),
            'institution' => $this->faker->bs(),
            'campus' => $this->faker->city(),
            'year' => $this->faker->randomElement([1, 2, 3, 4])
        ];
    }
}
