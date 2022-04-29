<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCharactersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('characters', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained();

            $table->string('name');


            $table->tinyInteger('str_score')->default(10);
            $table->tinyInteger('dex_score')->default(10);
            $table->tinyInteger('con_score')->default(10);
            $table->tinyInteger('int_score')->default(10);
            $table->tinyInteger('wis_score')->default(10);
            $table->tinyInteger('cha_score')->default(10);

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
        Schema::dropIfExists('characters');
    }
}
