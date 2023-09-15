<?php

namespace Database\Seeders;

use App\Models\Actualite;
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
        \App\Models\User::factory(10)->create();

        $this->call([ActiviteSeeder::class, ActualiteSeeder::class, ForfaitSeeder::class]);
        \App\Models\Reservation::factory(10)->create();
    }
}
