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
    
    public function spellDetails($id)
    {
        $spell = Spell::find($id);
        return view('spelldetails',['spell' => $spell]);
    }

    public function filter($filterName, $filter) {
        $levels = Spell::select('level')->distinct()->get();
        $class_name = SpellClass::select('class_name')->distinct('class_name')->get();
        $components = Spell::select('components')->distinct()->get();
        $school = Spell::select('school')->distinct()->get();
        
        if ($filterName != "classes") {
            $filter = str_replace ('%20', " ", $filter);
            $spells = Spell::where($filterName, $filter)->get();
            return view('spells', ['spells' => $spells,  'levels'=>$levels, 'class_name'=> $class_name, 'components' => $components, 'school' => $school]);
        } else {
            $spells = Spell::all();
            return view('spells', ['spells' => $spells,  'levels'=>$levels, 'class_name'=> $class_name, 'components' => $components, 'school' => $school]);
        }
    }

}


