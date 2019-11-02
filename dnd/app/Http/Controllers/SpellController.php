<?php

namespace App\Http\Controllers;
use App\Spell;
use App\SpellClass;
use Illuminate\Http\Request;
use League\Csv\Reader;
use Illuminate\Support\Facades\DB;
class SpellController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */

    // public function 
	private function getFilterValues($spells){
		$level = Spell::select('level')->distinct()->get();
		$concentration = Spell::select('concentration')->distinct()->get();
		$ritual = Spell::select('ritual')->distinct()->get();
		$classes = SpellClass::select('class_name','class_id')->distinct('class_name')->get();
		$school = Spell::select('school')->distinct()->get();
		$spells= $spells->sortBy('level');
		return ['spells'=> $spells, 'levels'=>$level->sortBy('level'), 'classes'=> $classes, 'schools' => $school, 'rituals' => $ritual, 'concentrations' => $concentration];
	}
    public function index()
    {
        $spells = Spell::all();
        return view('spells', $this->getFilterValues($spells));
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

    public function NewSave(Request $request){
        $spell = new Spell;
        //$class = SpellClass::find('classe_id');
        $spell->name='spellname';
        $spell->level=(int)'level'; 
        $spell->school='type'; 
        $spell->casting_time='castingtime'; 
        $spell->components='components'; 
        $spell->duration='duration'; 
        $spell->range='range'; 
        $spell->description='description'; 
        $spell->ritual='ritual'; 
        $spell->concentration='concentration'; 
        //$classes->classes='classes'; 
        $request->input('spellname', (int)'level', 'type', 'castingtime', 'components', 'duration','range', 'description', 'ritual', 'concentration', 'classes');
        $spell->save();
        //$classes = SpellClass::find($request['classes'])->get();
        //$spell -> classes($classes)->attach('api/spell');
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
        //$spell->ManyToMany(Spell::class);
       // return redirect(url("api/spells"));
       return $request;
    }

    public function filter($filterName, $filter) {
	$spells = Spell::query();
        if ($filterName != "class") {
            $filter = str_replace ('%20', " ", $filter);
            $spells = Spell::where($filterName, $filter);
            return view('spells', $this->getFilterValues($spells->get()));
        } else {
			$spell_ids = DB::table('spell_spell_class')
			->select('spell_id')->where('class_id',$filter)->pluck('spell_id')->all();
			$spells = $spells->whereIn('spell_id',$spell_ids);
            return view('spells', $this->getFilterValues($spells->get()));
        }
    }
public function multifilter(Request $request){
	$spells = Spell::query();

			$spell_ids = DB::table('spell_spell_class')
			->select('spell_id')->where('class_id',$request->input('class'))->pluck('spell_id')->all();
			$spells = $spells->whereIn('spell_id',$spell_ids);
			$spells = $spells->where('level',$request->input('level'));
			$spells = $spells->where('concentration',$request->input('concentration'));
			$spells = $spells->where('ritual',$request->input('ritual'));
			$spells = $spells->where('school',$request->input('school'));
		
	
	return view('spells', $this->getFilterValues($spells->get()));
	
}
}



