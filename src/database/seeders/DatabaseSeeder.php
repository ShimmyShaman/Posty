<?php

namespace Database\Seeders;

use Database\Factories\ListingFactory;
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
        \App\Models\User::factory(4)->create()->each(function($user) {
            \App\Models\Listing::factory(rand(1, 1))->create([
                'user_id' => $user->id
            ]);
        });
    }
}
