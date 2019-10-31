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

public function viewSpellBook () {

        $name = SpellBook::select('name')->get();
        $spell_book_id=SpellBook::select('spell_book_id')->get();
        return view('spellBook', ['name'=>$name, 'spell_book_id'=>$spell_book_id]);
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
}