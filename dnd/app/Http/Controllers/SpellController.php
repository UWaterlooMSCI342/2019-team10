<?php

namespace App\Http\Controllers;
use DB;
use App\Spell;
use App\SpellClass;
use Illuminate\Http\Request;
use App\SpellBook;
use League\Csv\Reader;
class SpellController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */

    // public function 
	private function getFilterValues($spells=[]){
		$level = Spell::select('level')->distinct()->get();
		$concentration = Spell::select('concentration')->distinct()->get();
		$ritual = Spell::select('ritual')->distinct()->get();
		$classes = SpellClass::select('class_name','class_id')->distinct('class_name')->get();
        $school = Spell::select('school')->distinct()->get();
      
        $spellbooks = SpellBook::all();
        if(!empty($spells)){
            $spells= $spells->sortBy('level');
        }
		return ['spells'=> $spells, 'levels'=>$level->sortBy('level'), 'classes'=> $classes, 'schools' => $school,  'rituals' => $ritual, 'concentrations' => $concentration, 'spellbooks'=> $spellbooks];
	}
    public function index()
    {
        $spells = Spell::all();
        return view('spells', $this->getFilterValues($spells));

    }

    private function formattedHints($exampleList, $example_key) {
         $example_strings = array();
        foreach($exampleList as $ex) {
            array_push($example_strings, $ex->$example_key);
        }
        return join(", ", $example_strings);
    }

	public function add($error=False)
    {

        $component = Spell::select('components')->distinct()->get();
        $castingtime = Spell::select('casting_time')->distinct()->take(3)->get();
        $duration = Spell::select('duration')->distinct()->take(3)->get();
        $range = Spell::select('range')->distinct()->take(3)->get();

        return view('add', ['components' => $component, 'castingtime'=> $this->formattedHints($castingtime,'casting_time'),
                            'duration' => $duration, 'duration'=> $this->formattedHints($duration,'duration'),
                            'range' => $duration, 'range'=> $this->formattedHints($range,'range'), 'error' => $error], 
                            $this->getFilterValues());
    }

    public function addError(){
        return $this->add(True);
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

        $class_names = $request->input('classes', null);
        if($class_names == null){
            return redirect(url("api/add/error"));
        }

        
        $components= $request->input('components');

        $spell = new Spell;
        $description = $request->input('description');
        $classes=SpellClass::query()->whereIn("class_id", $class_names)->get();

        $spell_name=$request->input('spellname',null);
        if($spell_name ==null){
            return redirect(url("api/add/error"));
        }

        $spell->name=$request->input('spellname', $spell_name);
        $spell->level=$request->input('level'); 
        $spell->school=$request->input('type'); 
        $spell->casting_time=$request->input('castingtime'); 
       if ($components != null){
             $spell->components= join(" ", $components);
        }
        $spell->duration=$request->input('duration'); 
        $spell->range=$request->input('range'); 
        $spell->description=$description; 
        $spell->description_length = strlen($description);
        $spell->ritual=$request->input('ritual'); 
        $spell->concentration=$request->input('concentration'); 
        

        $spell->save();
        $spell->addClasses($classes);
        return redirect(url("api/spells"));
        
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
	if ($request->input('level') != null){
		$spells = $spells->whereIn('level',$request->input('level'));
    }
	if ($request->input('class') != null){
        $classes = $request->input('class');
        $and = $request->input('classLogic') == 'on';
        if ($and && count($classes) > 0) {
            $spell_ids = DB::table('spell_spell_class')
                    ->select('spell_id')
                    ->where('class_id', $classes[0])
                    ->pluck('spell_id')
                    ->all();
            for ($i = 1; $i < count($classes); $i++) {
                $spell_ids = DB::table('spell_spell_class')
                        ->select('spell_id')
                        ->whereIn('spell_id', $spell_ids)
                        ->where('class_id', $classes[$i])
                        ->pluck('spell_id')
                        ->all();
            }
        } else {
            $spell_ids = DB::table('spell_spell_class')
                    ->select('spell_id')
                    ->whereIn('class_id',$classes)
                    ->pluck('spell_id')
                    ->all();
        }
		$spells = $spells->whereIn('spell_id',$spell_ids);	
    }
    if ($request->input('school') != null){
		$spells = $spells->whereIn('school',$request->input('school'));
	}
	if ($request->input('ritual') != "Any"){
		$spells = $spells->where('ritual',$request->input('ritual'));
	}
	if ($request->input('concentration') != "Any"){
		$spells = $spells->where('concentration',$request->input('concentration'));
	}
	return view('spells', $this->getFilterValues($spells->get()));
}
}



