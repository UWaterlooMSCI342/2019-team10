<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\DndModel;

class Spell extends DndModel
{
    public $table = 'spells';
    protected $primaryKey = 'name';
    public $incrementing = false;
    public function classes()
    {
        return $this->belongsToMany(SpellClass::class, "spell_spell_class", "name", "class_name");
    }
    public function formattedClasses() {
        $classes = $this->belongsToMany(SpellClass::class, "spell_spell_class", "name", "class_name")->get();
        $class_names = array();
        foreach($classes as $class) {
            array_push($class_names, $class->class_name);
        }
        return join(",", $class_names);
    }
}
