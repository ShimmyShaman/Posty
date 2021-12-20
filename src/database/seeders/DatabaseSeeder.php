<?php

namespace Database\Seeders;

use App\Enums\ListingType;
use App\Enums\TournamentState;
use App\Enums\UserTournamentStatus;
use Database\Factories\ListingFactory;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Date;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        DB::delete('truncate table tournaments');
        DB::delete('truncate table listings');
        DB::delete('truncate table users');
        DB::delete('truncate table tournament_user');

        \App\Models\Tournament::factory(1)->create()->each(function($tourny) {
            \App\Models\Listing::factory(1)->create([
                'title' => $tourny->title,
                'listing_id' => $tourny->id,
                'type' => ListingType::Tournament,
            ]);

            \App\Models\User::factory(7)->create()->each(function($user) {
                
                $tourny = DB::select('select * from tournaments')[0];

                DB::table('tournament_user')->insert(array(
                    'user_id' => $user->id,
                    'tournament_id' => $tourny->id,
                    'status' => UserTournamentStatus::SignedUp,
                    'created_at' => Date::now(),
                    'updated_at' => Date::now(),
                ));
            });
        });

        // $tourny_id = DB::select('select * from tournaments');
        


        // $title = "MRLTC Club Champs";

        // DB::table('tournaments')->insert([
        //     'title' => $title,
        //     'slug' => 'mrltc_club_champs',
        //     'state' => TournamentState::Signup,
        //     'start-date' => Date::createMidnightDate(2022, 3, 7),
        //     'created_at' => Date::now(),
        //     'updated_at' => Date::now(),
        // ]);

        // DB::table('listings')->insert([
        //     'title' => $title,
        //     'listing_id' => DB::statement('SELECT max(id) from homestead.tournaments;'),
        //     'type' => ListingType::Tournament,
        // ]);

        // DB::table('users')->insert([
        //     'name' => Str::random(10),
        //     'email' => Str::random(10).'@gmail.com',
        //     'password' => Hash::make('password'),
        // ]);
    }
}
