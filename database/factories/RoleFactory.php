<?php

namespace Database\Factories;

use App\Models\Role;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Foundation\Testing\RefreshDatabase;

class RoleFactory extends Factory
{
    use RefreshDatabase;
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Role::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'role' => 'student'
        ];
    }

    public function administrator()
    {
        return $this->state(function (array $attributes) {
            return [
                'role' => 'administrator'
            ];
        });
    }

    public function worker()
    {
        return $this->state(function (array $attributes) {
            return [
                'role' => 'worker'
            ];
        });
    }

    public function contributor()
    {
        return $this->state(function (array $attributes) {
            return [
                'role' => 'contributor'
            ];
        });
    }
}
