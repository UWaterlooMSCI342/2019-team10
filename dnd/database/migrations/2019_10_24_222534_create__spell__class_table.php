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
        Schema::create('spell_spell_class', function (Blueprint $table) {
       
            $table->increments('id');
            $table->string('spell_id');
            $table->string('class_id');
            $table->unique(['class_id', 'spell_id']);
            });
      
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('spell_class');
    }
}
