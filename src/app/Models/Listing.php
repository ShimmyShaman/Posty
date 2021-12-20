<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Listing extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function user()
    {
        return $this->belongsTo(related:User::class);
    }

    public function item_slug()
    {
        $gg = DB::table('tournaments')->select()->where('id', '=', $this->listing_id)->pluck('slug')[0];
        return $gg;
    }
}
