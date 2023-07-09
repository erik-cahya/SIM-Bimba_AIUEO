<?php

namespace Database\Seeders;

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
        // \App\Models\User::factory(10)->create();

        $this->call(JenisSeeder::class);
        $this->call(PaketSeeder::class);
        $this->call(UserSeeder::class);
        $this->call(MuridSeeder::class);
        // $this->call(MuridSeeder::class);
    }
}
