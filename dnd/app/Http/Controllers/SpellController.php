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
<<<<<<< HEAD
        $classes=SpellClass::select('class_name','class_id')->get();
        $level = Spell::select('level')->distinct()->get();
        $school = Spell::select('school')->distinct()->get();
        return view('add',['classes' => $classes, 'levels'=> $level->sortBy('level'), 'schools' => $school] , $this->getFilterValues());
=======
		$classes = ['Barbarian', 'Bard', 'Cleric','Druid','Fighter','Monk','Paladin','Ranger','Rogue','Sorcerer','Warlock','Wizard'];
        return view('add',['classes' => $classes]);
>>>>>>> parent of 678a10a... Working code!
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
        //$class = SpellClass::find($request->input('classes'));
        $spell->name=$request->input('spellname');
        $spell->level=$request->input('level'); 
        $spell->school=$request->input('type'); 
        $spell->casting_time=$request->input('castingtime'); 
        $spell->components=$request->input('components'); 
        $spell->duration=$request->input('duration'); 
        $spell->range=$request->input('range'); 
        $spell->description=$request->input('description'); 
        $spell->ritual=$request->input('ritual'); 
        $spell->concentration=$request->input('concentration'); 
        //$cls->classes=$request->input('classes'); 
        $spell->save();
        //$classes = SpellClass::find($request['classes'])->get();
        // $class -> spells()->attach('api/spell');
        //$class -> spells('spell_id')->attach('class_id');

            // foreach($cls as $classes) {
            //     $spell->classes()->attach($classes, ['name' => $spell->name, 'class_name' => $classes->class_name]);
            // }
        //$spell->ManyToMany(Spell::class);
        //$this->belongsToMany(Spell::class);
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



