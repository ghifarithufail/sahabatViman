<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class UserFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'id'    => $this->faker->unique->numerify('U-######'),
            'name' => fake()->name(),
            // 'email' => fake()->safeEmail(),
            // 'email_verified_at' => now(),
            'password' => '123', // password
            'no_telpon' => fake()->unique()->randomNumber(5, true),
            'role'  => 'koordinator_kecamatan'
            
        ];
    }

    /**
     * Indicate that the model's email address should be unverified.
     *
     * @return static
     */
    public function unverified()
    {
        return $this->state(fn (array $attributes) => [
            'email_verified_at' => null,
        ]);
    }
}
