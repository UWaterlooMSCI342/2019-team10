<?php

namespace App\Http\Controllers;
use App\Spell;
use App\SpellClass;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use attribute;
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
        $spell->name=spellname;
        $spell->level='level'; 
        $spell->school='type'; 
        $spell->casting_time='castingtime'; 
        $spell->components='components'; 
        $spell->duration='duration'; 
        $spell->range='range'; 
        $spell->description='description'; 
        $spell->ritual='ritual'; 
        $spell->concentration='concentration'; 
        //$class->classes='classes'; 
        $spell->save();
        $request->input('spellname', 'level', 'type', 'castingtime', 'components', 'duration','range', 'description', 'ritual', 'concentration', 'classes');
        // DB::insert('insert into users (spellname, NEXTCOLUMNTABLE) values (?, ?)', [$resquest->input('spellname'), NEXTREQUEST]);
        // DB::insert('insert into users (level, NEXTCOLUMNTABLE) values (?, ?)', [$resquest->input('level',null), NEXTREQUEST]);
        // DB::insert('insert into users (type, NEXTCOLUMNTABLE) values (?, ?)', [$resquest->input('type'), NEXTREQUEST]);
        // DB::insert('insert into users (castingtime, NEXTCOLUMNTABLE) values (?, ?)', [$resquest->input('castingtime'), NEXTREQUEST]);
        // DB::insert('insert into users (components, NEXTCOLUMNTABLE) values (?, ?)', [$resquest->input('components'), NEXTREQUEST]);
        // DB::insert('insert into users (duration, NEXTCOLUMNTABLE) values (?, ?)', [$resquest->input('duration'), NEXTREQUEST]);
        // DB::insert('insert into users (range, NEXTCOLUMNTABLE) values (?, ?)', [$resquest->input('range'), NEXTREQUEST]);
        // DB::insert('insert into users (description, NEXTCOLUMNTABLE) values (?, ?)', [$resquest->input('description'), NEXTREQUEST]);
        // DB::insert('insert into users (ritual, NEXTCOLUMNTABLE) values (?, ?)', [$resquest->input('ritual'), NEXTREQUEST]);
        // DB::insert('insert into users (concentration, NEXTCOLUMNTABLE) values (?, ?)', [$resquest->input('concentration'), NEXTREQUEST]);
        //DB::insert('insert into users (classes, NEXTCOLUMNTABLE) values (?, ?)', [$resquest->input('classes'), NEXTREQUEST]);
        $spell = Spell::create();
        $spell -> classes($class)->attach('api/spell');
        // foreach ($spell as $attr) {
        //     if ($attr == 'classes') {
        //         $tmp=explode (",", $row[$attr]);
        //         foreach ($tmp as $class) {
        //             $class = SpellClass::firstOrCreate(['class_name'=>$class]);
        //             array_push($spell_classes, $class);
        //         }
        //     } else {
        //         $spell->$attr=$row[$attr];
        //     }
        // }
        //     $spell->save();
        //     foreach($spell_classes as $class) {
        //         $spell->classes()->attach($class, ['name' => $spell->name, 'class_name' => $class->class_name]);
        //     }
        $spell->ManyToMany(Spell::class);
        return redirect(url("api/spells"));
    }
}

