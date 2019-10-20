<?php

namespace App\Http\Controllers;
use App\Spell;

use League\Csv\Reader;

class SpellController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */

    private function getSpellsFromCsv($csv_path) {
        $reader = Reader::createFromPath($csv_path, 'r');
        $keys = ["name", "level", "school", "ritual",
         "casting_time", "range",	"duration","concentration",
         "components", "materials", "description_length",
         "classes"];
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
        $spells = $this->getSpellsFromCsv("C:/wamp64/www/2019-team10/dnd/resources/csv/spell_csv.csv");
        return view('spells', ['spells' => $spells, 'attr_to_display' => ["name", "level", "school", "classes"]]);
    }
}
