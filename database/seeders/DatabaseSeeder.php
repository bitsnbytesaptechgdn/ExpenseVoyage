<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        \App\Models\User::factory(10)->create();
        \App\Models\Subscription::factory(10)->create();
        \App\Models\Category::factory(10)->create();
        \App\Models\Trip::factory(5)->create();
        \App\Models\TripUser::factory(5)->create();
    }
}
