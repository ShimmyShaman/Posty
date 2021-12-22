<?php

namespace App\Http\Controllers;

use App\Models\Tournament;
use Illuminate\Http\Request;
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
    public function signup($tslug)
    {
        return view('debug', [
            'debug' => $tslug
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
