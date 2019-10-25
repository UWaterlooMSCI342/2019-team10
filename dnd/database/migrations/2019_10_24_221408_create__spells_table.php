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
        
            $table ->string('name')->primary('name');
            $table ->integer('level');
            $table ->string ('school')->default('unspecified');
            $table ->string ('ritual')->default('unspecified');
            $table ->string ('casting_time')->default('unspecified');
            $table ->string ('range_length')->default('unspecified');
            $table ->string ('duration')->default('unspecified');
            $table ->string ('concentration')->default('unspecified');
            $table ->string ('component')->default('unspecified');
            $table ->string ('material')->default('unspecified');
            $table ->integer ('description_length')->default(0);
            $table ->string ('description')->default('unspecified');

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
