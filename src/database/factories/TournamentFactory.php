<?php

namespace Database\Factories;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;
use App\Enums\TournamentState;
use App\Models\Tournament;
use Illuminate\Support\Facades\Date;

class TournamentFactory extends Factory
{
    // protected $fake_titles = [
    //     'Singles Practise','Mixed Doubles','Club Championship','Club Social',
    //     'Wild Doubles Ladder', 'Chat Room'
    // ];
    // protected $types = [
    //     TournamentType::Casual, TournamentType::Casual, TournamentType::Tournament,
    //     TournamentType::SocialSession, TournamentType::LadderLeague, TournamentType::ChatRoom
    // ];
    // protected STATIC $Tournament_idx = -1;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'title' => "MRLTC Club Champs",
            'slug' => 'mrltc_club_champs',
            'state' => TournamentState::Signup,
            'start_date' => Date::createMidnightDate(2022, 3, 7),
        ];
    }
}
