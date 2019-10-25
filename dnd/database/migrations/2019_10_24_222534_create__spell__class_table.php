<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSpellClassTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('spell_class', function (Blueprint $table) {
       
            $table ->string('name');
            $table ->integer('class');
            $table -> foreign('name_Id')->references('name_Id')->on('spells');
            $table -> foreign('class_Id')->references('class')->on('class');

            });
      
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('_spell_class');
    }
}
