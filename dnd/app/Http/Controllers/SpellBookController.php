<?php

namespace App\Http\Controllers;
use App\Spell;
use App\SpellClass;
use App\SpellBook;

use League\Csv\Reader;
use Illuminate\Http\Request;

class SpellBookController extends Controller

{
    /**
     * Create a new controller instance.
     *
     * @return void
     */

    // public function 

public function viewSpellBook ($id=null) {
    $spells = [];
    $spellBooks = SpellBook::all();
    if ($id != null){
        $spellBook = SpellBook::find($id);
        if ($spellBook != null) {
            $spells=$spellBook->spells;
        }
    } else {
        if (!empty($spellBooks)) {
            $spells = SpellBook::find($spellBooks[0]->spell_book_id)->spells;
        }
    }
    return view('viewSpellbooks', ['spellbooks'=>$spellBooks, 'starting_spells'=>$spells]);
}

public function addSpells(Request $request) {
        $spellIds = $request->input("spells");
        $spells = Spell::query()->whereIn("spell_id", $spellIds)->get();
        $newSpellbookName = trim($request ->input("newSpellbookName"));
        if(empty($newSpellbookName)){
            $spellBook = SpellBook::find($request->input("spellbook"));
            SpellBook::addSpells($spells,$spellBook);
        }else{
            SpellBook::addToNewOrExisting($newSpellbookName, $spells);
        }
        return redirect(url("api/spells"));
    }
}
