<?php

namespace App\Http\Controllers;

use App\Models\Listing;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    //
    public function index()
    {
        // return "@component('layouts.master')
        //         @include('components.listings')
        //         @endcomponent";
        return view('home', [
            'listings' => Listing::all()
        ]);
        // $html = view('layouts.master', [
        //     $slot='components.listings',
        // ]);
        // return $html; 
    }
}
