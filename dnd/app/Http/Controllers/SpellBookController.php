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
    $spellBook = null;
    if ($id != null){
        $spellBook = SpellBook::find($id);
        if ($spellBook != null) {
            $spells=$spellBook->spells;
        }
    } else {
        if (!empty($spellBooks)) {
            $spellBook = SpellBook::find($spellBooks[0]->spell_book_id);
            $spells = $spellBook->spells;
        }
    }
    return view('viewSpellbooks', ['spellbooks'=>$spellBooks, 'selected_spellbook'=>$spellBook, 'starting_spells'=>$spells]);
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
public function dltSpellInSpellBook($spellId){
        $spell = Spell::find($spellId);
        $spell->SpellBook()->detach();
        return redirect(url("api/spellbooks"));
    }
}
