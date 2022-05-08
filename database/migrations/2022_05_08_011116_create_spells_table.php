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
            $table->id();

            $table->string('name')->unique();
            $table->text('description');
            $table->tinyInteger('level');
            $table->boolean('concentration')->default(false);
            $table->boolean('ritual')->default(false);
            $table->string("cast_time");
            $table->string('duration');
            $table->string('school');
            $table->string('range_area');
            $table->string('components');
            $table->string('material_component')->nullable();
            $table->string('attack_save')->nullable();
            $table->string('damage_type')->nullable();
            $table->text('higher_level')->nullable();


            $table->timestamps();
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
