<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\DndModel;

class SpellClass extends DndModel
{
    public $table = 'spell_classes';
    protected $primaryKey = 'class_name';
    public $incrementing = false;
    protected $fillable = ['class_name'];
    public function spells()
    {
        return $this->belongsToMany(Spell::class);
    }
}
