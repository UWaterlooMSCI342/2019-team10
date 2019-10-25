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
}
