<?php

use Illuminate\Database\Seeder;
use App\Spell;

class SpellTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('spells') -> delete();
        $spells = factory(Spell::class, 10)->create();
    }
}
