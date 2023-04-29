<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Koord_kecamatan>
 */
class Koord_kecamatanFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'id'        => $this->faker->unique->numerify('KC-######'),
            'nama'      => $this->faker->name(),
            'desa'      => $this->faker->city(),
            'deskripsi' => $this->faker->city(),
            'team_id'   => 'T-258650',
            'dapil'     => $this->faker->randomNumber(1, true),
        ];
    }
}
