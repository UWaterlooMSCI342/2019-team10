<?php

namespace App\Http\Controllers;
use App\Spell;
use App\SpellClass;
use App\SpellBook;

use League\Csv\Reader;

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
}
}