<?php

namespace Database\Seeders;

use App\Models\Child;
use App\Models\Pet;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        $user =  User::factory()->create([
            'name' => 'Admin',
            'email' => 'admin@test.com',
        ]);

        for($i = 0; $i < 5; $i++) {
            $pet = $user->pets()->create([
                'name' => fake()->name
            ]);

            for($i = 0; $i < 5; $i++) {
                $pet->children()->create([
                    'name' => fake()->name
                ]);
            }
        }
    }
}
