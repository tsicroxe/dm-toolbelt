<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\Race;
use Illuminate\Support\Facades\DB;

class CreateRacesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('races', function (Blueprint $table) {
            $table->id();

            
            $table->string('name')->unique();
            $table->text('description');
            $table->string('walking_speed')->default('30');
            $table->string('asi');
            $table->string('size');
            $table->text('size_description');
            $table->string('age');


            $table->tinyInteger('str_bonus')->default(0);
            $table->tinyInteger('dex_bonus')->default(0);
            $table->tinyInteger('con_bonus')->default(0);
            $table->tinyInteger('int_bonus')->default(0);
            $table->tinyInteger('wis_bonus')->default(0);
            $table->tinyInteger('cha_bonus')->default(0);

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
        Schema::dropIfExists('races');
    }
}
