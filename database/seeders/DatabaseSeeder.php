<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Koord_desa;
use App\Models\Koord_kecamatan;
use App\Models\Relawan;
use App\Models\Team;
use App\Models\User;
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
        // \App\Models\User::factory(1340)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        Relawan::factory(3000)->create();

        // Team::factory(14)->create();

        // Koord_kecamatan::factory(4000)->create();

        // Koord_desa::factory(10)->create();

        // User::factory(11000)->create();
    }
}
