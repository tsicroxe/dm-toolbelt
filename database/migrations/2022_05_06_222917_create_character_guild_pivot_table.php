<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCharacterGuildPivotTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('character_guild', function (Blueprint $table) {
            $table->id();

            $table->foreignId('character_id')->constrained()->onDelete("cascade");;
            $table->foreignId('guild_id')->constrained()->onDelete("cascade");;

            $table->integer('level')->default(1);

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
        Schema::dropIfExists('character_guild');
    }
}
