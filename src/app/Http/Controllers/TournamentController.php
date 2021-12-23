<?php

namespace App\Http\Controllers;

use App\Http\Requests\TournamentRequest;
use App\Models\Tournament;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class TournamentController extends Controller
{
    /*
     * Show the tournament with the slug id
     */
    public function show($tslug)
    {
        // $tourny = DB::table('tournaments')->select()->where('slug', '=', $tslug);
        $query = Tournament::where('slug', '=', $tslug);
        if($query->count() != 1)
            return view('errors.404');
        
        $tourny = $query->first();
        return view('tournament', [
            'tourny' => $tourny
        ]);
    }

    /*
     * Show the tournament with the slug id
     */
    public function signup(TournamentRequest $request)
    {
        // Validate the input data
        $validated = $request->validated();

        // Check the user is not already signed up to the tournament
        $already_signed_up = DB::select("select user_id from homestead.tournament_user where tournament_id="
                                            . $validated['tid'] . " and user_id="
                                            . strval(Auth::user()->id) . " limit 1;");

        if(sizeof($already_signed_up) != 0) {                
            return view('debug', [
                'debug' => strval(sizeof($already_signed_up)),
            ]);
        }

        TODO insert user into database and refresh tournament view

        return view('debug', [
            'debug' => strval(sizeof($already_signed_up)),
        ]);
        // // $tourny = DB::table('tournaments')->select()->where('slug', '=', $tslug);
        // $query = Tournament::where('slug', '=', $tslug);
        // if($query->count() != 1)
        //     return view('errors.404');
        
        // $tourny = $query->first();
        // return view('tournament', [
        //     'tourny' => $tourny
        // ]);
    }
}
