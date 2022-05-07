<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class CreateGuildsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('guilds', function (Blueprint $table) {
            $table->id();
            
            $table->string('name')->unique();

            $table->timestamps();
        });

        DB::table('guilds')->insert($this->getGuildData());

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('guilds');
    }

    protected function getGuildData()
    {
        return [
            [
                'name' => 'Bard',
            ],
            [
                'name' => 'Barbarian',
            ],
            [
                'name' => 'Cleric',
            ],
            [
                'name' => 'Druid',
            ],
            [
                'name' => 'Fighter',
            ],
            [
                'name' => 'Monk',
            ],
            [
                'name' => 'Paladin',
            ],
            [
                'name' => 'Ranger',
            ],
            [
                'name' => 'Rogue',
            ],
            [
                'name' => 'Sorcerer',
            ],
            [
                'name' => 'Warlock',
            ],
            [
                'name' => 'Wizard',
            ]
            
            ];
    }
}
