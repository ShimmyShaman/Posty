<?php

namespace Database\Factories;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;
use App\Enums\ListingType;
use App\Models\Listing;
use App\Models\Tournament;

class ListingFactory extends Factory
{
    // protected $fake_titles = [
    //     'Singles Practise','Mixed Doubles','Club Championship','Club Social',
    //     'Wild Doubles Ladder', 'Chat Room'
    // ];
    // protected $types = [
    //     ListingType::Casual, ListingType::Casual, ListingType::Tournament,
    //     ListingType::SocialSession, ListingType::LadderLeague, ListingType::ChatRoom
    // ];
    // protected STATIC $listing_idx = -1;

    // /**
    //  * Define the model's default state.
    //  *
    //  * @return array
    //  */
    // public function definition()
    // {
    //     // $title = strtolower($this->a_titles(rand(0, 4)))
    //     // $utitle = $this->faker->sentence(rand(3, 6));

    //     ListingFactory::$listing_idx++;
    //     if(ListingFactory::$listing_idx >= count($this->fake_titles))
    //         ListingFactory::$listing_idx = 0;

    //     $slug = str_replace(" ", "", strtolower($this->fake_titles[ListingFactory::$listing_idx]));
    //     $slug = substr($slug, 0, min(strlen($slug) - 1, 6));
    //     $slug = $slug . '-' . rand(111, 999); 
            
    //     return [
    //         'title' => $this->fake_titles[ListingFactory::$listing_idx],
    //         'slug' => $slug,
    //         'type' => $this->types[ListingFactory::$listing_idx],
    //     ];
    // }

    public function definition( )
    {
        return [
        ];
    }
}
