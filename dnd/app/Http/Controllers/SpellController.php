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
		$class_name = SpellClass::select('class_name')->distinct('class_name')->get();
		$school = Spell::select('school')->distinct()->get();
		
		return ['spells'=> $spells, 'level'=>$level, 'class_name'=> $class_name, 'school' => $school, 'ritual' => $ritual, 'concentration' => $concentration];
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


    public function filter($filterName, $filter) {

        if ($filterName != "classes") {
            $filter = str_replace ('%20', " ", $filter);
            $spells = Spell::where($filterName, $filter);
            return view('spells', getFilterValues($spells->get()));
        } else {
        
            return view('spells', $this->getFilterValues($spells->get()));
        }
    }
public function multifilter(Request $request){
	
	$spells = Spell::query();

		if($request->input('level')){
			$spells = $spells->where('level',$request->input('level'));
		}
		if($request->input('concentration')){
			$spells = $spells->where('concentration',$request->input('concentration'));
		}
		if($request->input('ritual')){
			$spells = $spells->where('ritual',$request->input('ritual'));
		}
		if($request->input('school')){
			$spells = $spells->where('school',$request->input('school'));
		}
	
	return view('spells', $this->getFilterValues($spells->get()));
	
}
}



