<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSpellsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('spells', function (Blueprint $table) {
        
            $table ->string('name_Id_primary');
            $table ->integer('level_Id');
            $table ->string ('school');
            $table ->string ('ritual');
            $table ->string ('casting_time');
            $table ->string ('range_length');
            $table ->string ('duration');
            $table ->string ('concentration');
            $table ->string ('component');
            $table ->string ('material');
            $table ->integer ('description_length');
            $table ->string ('description_Id');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('spells');
    }
}
