<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\DndModel;

class SpellBook extends DndModel
{
    public $table = 'spell_books';
    protected $primaryKey = 'spell_book_id';
    public $incrementing = true;
    protected $fillable = ['name'];
    public static function newWith($name, $spells) {
        $spellBook = $this->create($name);
        foreach($spells as $spell) {
            $spellBook->spells()->attach($spell, ['spell_book_id' => $spellBook->spell_book_id, 'spell_id' => $spell->spell_id]);
        }
        return $spellBook;
    }

    public function spells()
    {
        return $this->belongsToMany(Spell::class);
    }

    public function addSpells($spells) {
        foreach($spells as $spell) {
            $this->spells()->attach($spell, ['spell_book_id' => $this->spell_book_id, 'spell_id' => $spell->spell_id]);
        }
    }
}
