<?php

namespace App\Http\Controllers;
use App\Spell;
use App\SpellClass;
use Illuminate\Http\Request;

use League\Csv\Reader;

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
        return view('spells', ['spells' => $spells]);
    }
    
	public function addNewSpells()
    {
		$classes = ['Barbarian', 'Bard', 'Cleric','Druid','Fighter','Monk','Paladin','Ranger','Rogue','Sorcerer','Warlock','Wizard'];
        return view('addNewSpells',['classes' => $classes]);
    }
    public function dlt($spellId){
        $spell = Spell::find($spellId);
        $spell->delete();
        $spell->classes()->detach();
        return redirect(url("api/spells"));
      }
    public function NewSave(Request $request){
        // $spell->new Spell;
        // $spell->attribute('spellname', 'level', 'type', 'castingtime', 'components', 'duration','range', 'description')
        // $request->input('spellname', 'level', 'type', 'castingtime', 'components', 'duration','range', 'description')
        // $spell = Spell::create();
        // $spell -> classes()->attach('api/spell');
        // $spell->belongsToMany(Spell::class);
        return $request;
    }
}
