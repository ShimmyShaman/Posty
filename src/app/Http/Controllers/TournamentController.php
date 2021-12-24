<?php

namespace App\Http\Controllers;

use App\Enums\UserTournamentStatus;
use App\Http\Requests\TournamentRequest;
use App\Models\Tournament;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class TournamentController extends Controller
{
    protected function isUserSignedUp($tid)
    {
        if(!Auth::check()) {
            return false;
        }

        // Check the user is not already signed up to the tournament
        $already_signed_up = DB::select("select user_id from homestead.tournament_user where tournament_id="
                                            . $tid . " and user_id="
                                            . strval(Auth::user()->id) . " limit 1;");

        return sizeof($already_signed_up) != 0;
    }

    /*
     * Show the tournament with the slug id
     */
    public function showBySlug($tslug)
    {
        // $tourny = DB::table('tournaments')->select()->where('slug', '=', $tslug);
        $query = Tournament::where('slug', '=', $tslug);
        if($query->count() != 1)
            return view('errors.404');

        $tourny = $query->first();
        $already_signed_up = $this->isUserSignedUp($tourny->id);
        
        return view('tournament', [
            'tourny' => $tourny,
            'already_signed_up' => $already_signed_up,
        ]);
    }

    /*
     * Show the tournament with the tournament id
     * Note: just redirects to the slug route
     */
    public function showById($tid)
    {
        // $tourny = DB::table('tournaments')->select()->where('slug', '=', $tslug);
        $query = Tournament::where('id', '=', $tid);
        if($query->count() != 1)
            return view('errors.404');
        
        $tourny = $query->first();
        return redirect('/t/' . strval($tourny->slug));
    }

    /*
     * Show the tournament with the slug id
     */
    public function signup(TournamentRequest $request)
    {
        // Validate the input data
        $validated = $request->validated();

        if($this->isUserSignedUp($validated['tid'])) {                
            return view('debug', [
                'debug' => "user is already signed up",
            ]);
        }

        // Register the user for the tournament in the database
        DB::table('tournament_user')->insert([
            'tournament_id' => $validated['tid'],
            'user_id' => Auth::user()->id,
            'status' => UserTournamentStatus::SignedUp,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        // Return to the tournament
        return $this->showById($validated['tid']);
    }
}
