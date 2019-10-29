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
        $spell = new Spell;
        $spell->attribute('spellname');
        $spell->attribute('level'); 
        $spell->attribute('type'); 
        $spell->attribute('castingtime'); 
        $spell->attribute('components'); 
        $spell->attribute('duration'); 
        $spell->attribute('range'); 
        $spell->attribute('description'); 
        $spell->attribute('ritual'); 
        $spell->attribute('concentration'); 
        $spell->attribute('classes'); 
        $request->input('spellname', 'level', 'type', 'castingtime', 'components', 'duration','range', 'description', 'ritual', 'concentration', 'classes');
        $spell = Spell::create();
        $spell -> classes()->attach('api/spell');
        foreach ($spell as $attr) {
            if ($attr == 'classes') {
                $tmp=explode (",", $row[$attr]);
                foreach ($tmp as $class) {
                    $class = SpellClass::firstOrCreate(['class_name'=>$class]);
                    array_push($spell_classes, $class);
                }
            } else {
                $spell->$attr=$row[$attr];
            }
        }
            $spell->save();
            foreach($spell_classes as $class) {
                $spell->classes()->attach($class, ['name' => $spell->name, 'class_name' => $class->class_name]);
            }
        //$spell->belongsToMany(Spell::class);
        return redirect(url("api/spells"));
    }
}

