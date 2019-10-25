<?php

namespace App\Http\Controllers;
use App\Spell;
use App\SpellClass;

use League\Csv\Reader;

class SpellController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */

    // public function 

    public function index()
    {
        $spells = Spell::all();
        $levels = Spell::select('level')->distinct()->get();
        $class_name = SpellClass::select('class_name')->distinct('class_name')->get();
        $components = Spell::select('components')->distinct()->get();
        $school = Spell::select('school')->distinct()->get();
      

        return view('spells', ['spells' => $spells,  'levels'=>$levels, 'class_name'=> $class_name, 'components' => $components, 'school' => $school]);
    }

	public function add()
    {
		$classes = ['Barbarian', 'Bard', 'Cleric','Druid','Fighter','Monk','Paladin','Ranger','Rogue','Sorcerer','Warlock','Wizard'];
        return view('add',['classes' => $classes]);
    }

    public function dlt($spellId){
        $spell = Spell::find($spellId);
        $spell->delete();
        $spell->classes()->detach();
        return redirect(url("api/spells"));
    }
    
    public function spelldetails()
    {

        $details = ['Aid','2','Abjuration','Non-ritual','1 action','30 feet','8 hours','Non-concentration','V S M', 'A tiny strip of white cloth','Clearic, Paladin'];
        
        $description = ['Your spell bolsters your allies with toughness and resolve. Choose up to three creatures within range. Each target’s hit point maximum and current hit points increase by 5 for the duration. At Higher Levels. When you cast this spell using a spell slot of 3rd level or higher, a target’s hit points increase by an additional 5 for each slot level above 2nd.'];

        return view('spelldetails',['details' => $details],['description' => $description]);
    }

}
