<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Koord_desa>
 */
class Koord_desaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'id'                    => $this->faker->unique->numerify('DES-######'),
            'Koord_kecamatan_id'    => 'KC-001199',
            'nama'                  => $this->faker->name(),
            'deskripsi'             => $this->faker->city(),
            'dapil'                 => $this->faker->randomNumber(1, true),
        ];
    }
}
