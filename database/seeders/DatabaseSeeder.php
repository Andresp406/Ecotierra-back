<?php

namespace Database\Seeders;

use App\Models\{Sales, User};
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
        User::factory()->create(['email' => 'example@example.com']);
        Sales::factory(10)->create();
    }
}
