<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\DndModel;

class Spell extends DndModel
{
    public $table = 'spells';
    protected $primaryKey = 'spell_id';
    public $incrementing = true;
    public function classes()
    {
        return $this->belongsToMany(SpellClass::class, "spell_spell_class", "spell_id", "class_id");
    }
    public function formattedClasses() {
        $classes = $this->belongsToMany(SpellClass::class, "spell_spell_class", "spell_id", "class_id")->get();
        $class_names = array();
        foreach($classes as $class) {
            array_push($class_names, $class->class_name);
        }
        return join(",", $class_names);
    }
}
