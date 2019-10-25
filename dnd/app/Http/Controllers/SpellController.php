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


    function file_build_path(...$segments) {
        return join(DIRECTORY_SEPARATOR, $segments);
    }
    
    private function getSpellsFromCsv($csv_path) {
        $reader = Reader::createFromPath($csv_path, 'r');
        $keys = ["name", "level", "school", "ritual",
         "casting_time", "range",	"duration","concentration",
         "components", "materials", "description_length",
         "classes", "description"];
        $spells = array();
        $spell_from_csv = $reader->fetchAssoc($keys);
        foreach ($spell_from_csv as $row) {
            $spell = new Spell;
            foreach ($keys as $attr) {
                $spell->$attr=$row[$attr];
            }
            array_push($spells, $spell);
        }
        return $spells;
    }

    public function index()
    {
        $base=__DIR__.DIRECTORY_SEPARATOR;
        $spells = $this->getSpellsFromCsv($base.$this->file_build_path("..","..","..", "resources", "csv", "spell_csv.csv"));
        return view('spells', ['spells' => $spells, 'attr_to_display' => ["level", "name", "classes", "components", "school"]]);
    }
	public function addNewSpells()
    {
		$classes = ['Barbarian', 'Bard', 'Cleric','Druid','Fighter','Monk','Paladin','Ranger','Rogue','Sorcerer','Warlock','Wizard'];
        return view('addNewSpells',['classes' => $classes]);
        $spells = Spell::all();
        $this->test();
        $spell = Spell::find("Fireball");
        return $spell->classes()->get();
    }

    public function test(){
        $classA = new SpellClass;
        $classA->class_name="Wizard";
        $classA->save();

        $classB = new SpellClass;
        $classB->class_name="Ranger";
        $classB->save();

        $spell = new Spell;
        $spell->name = "Fireball";
        $spell->level = 2;

        $spell->save();

        $class_spell = SpellClass::find('Wizard');
        $spell->classes()->save($class_spell, ['name' => $spell->name, 'class_name' => $class_spell->class_name]);
        $class_spell = SpellClass::find('Ranger');
        $spell->classes()->save($class_spell, ['name' => $spell->name, 'class_name' => $class_spell->class_name]);
    }
}
