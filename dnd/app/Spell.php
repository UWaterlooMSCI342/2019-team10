<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\DndModel;

class Spell extends DndModel
{
    public $table = 'spells';
    protected $primaryKey = 'spell_id';
    public $incrementing = true;

    public static function getSpellsWithIds($spell_ids) {
        return DB::table($table)
                    ->whereIn($primaryKey, $spell_ids)->get();
    }

    public function classes()
    {
        return $this->belongsToMany(SpellClass::class, "spell_spell_class", "spell_id", "class_id");
    }

    public function spellBooks() {
        return $this->belongsToMany(SpellBook::class, "spell_books_spells", "spell_id", "spell_book_id");
    }

    public function addClasses($spell_classes) {
        foreach($spell_classes as $class) {
            $this->classes()->attach($class, ['spell_id' => $this->spell_id, 'class_id' => $class->class_id]);
        }
    }

    public function formattedClasses() {
        $classes = $this->belongsToMany(SpellClass::class, "spell_spell_class", "spell_id", "class_id")->get()->sortBy('class_name');
        $class_names = array();
        foreach($classes as $class) {
            array_push($class_names, $class->class_name);
        }
        asort($class_names);
        return join(", ", $class_names);
    }

    public function chunkifyDescription($chars_per_chunk){
        $s = chunk_split($this->description, $chars_per_chunk, '|');
        $s = substr($s, 0, -1);
        return explode('|', $s);
    }
}
