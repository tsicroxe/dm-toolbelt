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
            $table->tinyInteger('level')->default(1);
            
            $table->integer('experience')->default(0);

            $table->boolean('inspiration')->default(false);
            
            $table->integer('current_hp')->default(0);
            $table->integer('max_hp')->default(0);

            $table->text('personality_traits')->nullable();
            $table->text('ideals')->nullable();
            $table->text('bonds')->nullable();
            $table->text('flaws')->nullable();

            $table->boolean('death_save_one')->default(false);
            $table->boolean('death_save_two')->default(false);
            $table->boolean('death_save_three')->default(false);



            // Ability scores
            $table->tinyInteger('str_score')->default(10);
            $table->tinyInteger('dex_score')->default(10);
            $table->tinyInteger('con_score')->default(10);
            $table->tinyInteger('int_score')->default(10);
            $table->tinyInteger('wis_score')->default(10);
            $table->tinyInteger('cha_score')->default(10);

            // Skills
            $table->string('acrobatics')->default('untrained');
            $table->string('animal_handling')->default('untrained');
            $table->string('arcana')->default('untrained');
            $table->string('athletics')->default('untrained');
            $table->string('deception')->default('untrained');
            $table->string('history')->default('untrained');
            $table->string('insight')->default('untrained');
            $table->string('intimidation')->default('untrained');
            $table->string('investigation')->default('untrained');
            $table->string('medicine')->default('untrained');
            $table->string('nature')->default('untrained');
            $table->string('perception')->default('untrained');
            $table->string('performance')->default('untrained');
            $table->string('persuasion')->default('untrained');
            $table->string('religion')->default('untrained');
            $table->string('sleight_of_hand')->default('untrained');
            $table->string('stealth')->default('untrained');
            $table->string('survival')->default('untrained');

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
