<?php

namespace Database\Seeders;

use App\Enums\ListingType;
use App\Enums\TournamentState;
use App\Enums\UserTournamentStatus;
use App\Models\Listing;
use App\Models\Tournament;
use App\Models\User;
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

    // Tournament with Signup & 7 participants
    {
      global $tourny;
      $tourny = Tournament::factory(1)->create([
          'title' => "MRLTC Club Champs",
          'slug' => 'mrltc_club_champs'
        ])->each(function($tourny) {
          Listing::factory(1)->create([
            'title' => $tourny->title,
            'listing_id' => $tourny->id,
            'type' => ListingType::Tournament,
          ]);
      });

      User::factory(7)->create()->each(function($user) {
        global $tourny;
        DB::table('tournament_user')->insert(array(
            'user_id' => $user->id,
            'tournament_id' => $tourny->id,
            'status' => UserTournamentStatus::SignedUp,
            'created_at' => Date::now(),
            'updated_at' => Date::now(),
        ));
      });
    }
    
    // Tournament: first round & 7 participants
    {
      global $tourny;
      $tourny = Tournament::factory(1)->create([
          'title' => "Febuary Knockout",
          'slug' => 'feb_knockout',
          'state' => TournamentState::Ongoing
        ])->each(function($tourny) {
          Listing::factory(1)->create([
            'title' => $tourny->title,
            'listing_id' => $tourny->id,
            'type' => ListingType::Tournament,
          ]);
      });

      User::factory(7)->create()->each(function($user) {
        global $tourny;
        DB::table('tournament_user')->insert(array(
            'user_id' => $user->id,
            'tournament_id' => $tourny->id,
            'status' => UserTournamentStatus::SignedUp,
            'created_at' => Date::now(),
            'updated_at' => Date::now(),
        ));
      });

      $participants = DB::select('select * from homestead.tournament_user where tournament_id=' .
          strval($tourny->id) . ';');

      for ($i = 0; $i + 2 <= sizeof($participants); $i += 2) {
          DB::table('tournament_match')->insert([
              'tournament_id' => $tourny->id,
              'player_one_id' => $participants[$i]->id,
              'player_two_id' => $participants[$i + 1]->id,
          ]);
      }
    }
  }
}
