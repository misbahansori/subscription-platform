<?php

namespace Database\Seeders;

use App\Models\Website;
use App\Models\Subscribers;
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
        Website::factory()
            ->times(100)
            ->has(Subscribers::factory(rand(100, 150)))
            ->create();
    }
}
