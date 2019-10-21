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
        $csv_dir_path = env("APP_CSV_DIR", __DIR__);
        $reader = Reader::createFromPath($csv_dir_path.$csv_path, 'r');
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
        $spells = $this->getSpellsFromCsv("spell_csv.csv");
        return view('spells', ['spells' => $spells, 'attr_to_display' => ["name", "level", "school", "classes"]]);
    }
}
