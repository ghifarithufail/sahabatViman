<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Relawan>
 */
class RelawanFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
        'user_id'        => 'U-000027',
        'nik'            => $this->faker->unique->randomNumber(9, true),
        'nokk'           => $this->faker->unique->randomNumber(9, true),
        'nama'           => $this->faker->name(),
        'tempat_lahir'   => $this->faker->city(),
        'tgl_lahir'      => $this->faker->dateTime(),
        'status'         => 'S',
        'jenis'          => 'Pria',
        'alamat'         => $this->faker->address(),
        'rw'             => $this->faker->randomDigitNotNull(),
        'rt'             => $this->faker->randomDigitNotNull(),
        'tps'            => $this->faker->randomDigitNotNull(),
        'Koord_desa_id'  => 'DES-007231',
        'kelurahan_id'   => 121,
        'created_at'     => '2023-01-21 12:16:40'
        ];
    }
}
