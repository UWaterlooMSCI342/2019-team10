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

    private $max_desc_len_per_card = 1500;

    public function viewSpellBook ($id=null) {
        $spells = [];
        $spellBooks = SpellBook::all();
        $spellBook = null;

        if ($id != null){
            $spellBook = SpellBook::find($id);
            if ($spellBook != null) {
                $spells=$spellBook->spells;
                $spells= $spells->sortBy('level');
            }
        } else {
            if (count($spellBooks) != 0) {
                $spellBook = SpellBook::find($spellBooks[0]->spell_book_id);
                $spells = $spellBook->spells;
                $spells= $spells->sortBy('level');
            }
        }
        return view('viewSpellbooks', ['spellbooks'=>$spellBooks, 'selected_spellbook'=>$spellBook, 'starting_spells'=>$spells]);
    }

    public function addSpells(Request $request) {

        $spellIds = $request->input("spells");
        $spells = Spell::query()->whereIn("spell_id", $spellIds)->get();
        $newSpellbookName = trim($request ->input("newSpellbookName"));
        if(empty($newSpellbookName)){
            $spellBook = SpellBook::find($request->input("spellbook", null));
            if ($spellBook != null) {
                SpellBook::addSpells($spells,$spellBook);
            }
        }else{
            SpellBook::addToNewOrExisting($newSpellbookName, $spells);
        }
        return redirect(url("api/spells"));
    }

    public function dltSpellInSpellBook($spellId,$spellBookId){
        $spellBook = SpellBook::find($spellBookId);
        $spellBook->spells()->detach($spellId);
        return redirect(url("api/spellbooks/" .$spellBookId));
    }


    public function dltSpellbook($spellBookId){
        $spellBook = SpellBook::find($spellBookId);
        $spellBook->spells()->detach();
        $spellBook->delete();
        return redirect(url("api/spellbooks"));
    }

    public function export($spellBookId){
        $spellBook = SpellBook::find($spellBookId);
        $spells=$spellBook->spells;
        return view('export',['spells'=>$spells, 'desc_len_per_card' => $this->max_desc_len_per_card]);
    }

}
