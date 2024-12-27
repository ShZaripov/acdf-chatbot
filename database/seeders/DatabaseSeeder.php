<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        \App\Models\User::factory()->create([
            'name' => 'admin',
            'password' => '$2y$10$YzIVi3WFpE2ZjRQR3fG2S.gTXTJmbOyizHmlmp3JnryBtoDPB8W6W',
            'email' => 'admin@acdf.com',
        ]);
    }
}