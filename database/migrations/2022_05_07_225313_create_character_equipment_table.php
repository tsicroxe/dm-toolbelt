<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCharacterEquipmentTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('character_equipment', function (Blueprint $table) {
            $table->id();


            $table->foreignId('character_id')->constrained();
            $table->foreignId('equipment_id')->constrained();

            $table->integer('quantity')->default(1);
            $table->boolean('equipped')->default(0);

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
        Schema::dropIfExists('character_equipment');
    }
}
