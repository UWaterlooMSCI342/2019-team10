<?php

namespace App\Http\Controllers;
use App\Spell;

class SpellController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function index()
    {
        $spells = Spell::all();
        return response()->json($spells);
    }
}
