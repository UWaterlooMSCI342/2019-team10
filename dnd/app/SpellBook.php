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

    public static function addToNewOrExisting($name, $spells) {
        $spellBook = SpellBook::firstOrCreate(["name"=>$name]);
        $spellBook = SpellBook::addSpells($spells, $spellBook);
        return $spellBook;
    }

    public function spells()
    {
        return $this->belongsToMany(Spell::class, "spell_books_spells", "spell_book_id", "spell_id");
    }
    
    public static function addSpells($spells, $spellBook) {
        foreach($spells as $spell) {
            if(!$spellBook->spells->contains($spell->spell_id)){
                $spellBook->spells()->attach($spell, ['spell_book_id' => $spellBook->spell_book_id, 'spell_id' => $spell->spell_id]);
            }
        }
        return $spellBook;
    }
}
