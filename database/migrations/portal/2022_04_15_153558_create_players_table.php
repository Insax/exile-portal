<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    protected $connection = 'portal';

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('players', function (Blueprint $table) {
            $table->unsignedBigInteger('id')->primary();
            $table->string('name', 64);
            $table->string('account_uid', 17);
            $table->unsignedInteger('money');
            $table->double('damage');
            $table->double('hunger');
            $table->double('thirst');
            $table->double('alcohol');
            $table->double('temperature');
            $table->double('wetness');
            $table->double('oxygen_remaining');
            $table->double('bleeding_remaining');
            $table->string('hitpoints', 1024);
            $table->double('direction');
            $table->double('position_x');
            $table->double('position_y');
            $table->double('position_z');
            $table->dateTime('spawned_at');
            $table->text('assigned_items');
            $table->string('backpack', 64);
            $table->text('backpack_items');
            $table->text('backpack_magazines');
            $table->text('backpack_weapons');
            $table->string('current_weapon', 64);
            $table->string('goggles', 64);
            $table->text('handgun_items');
            $table->string('handgun_weapon', 64);
            $table->string('headgear', 64);
            $table->string('binocular', 64);
            $table->text('loaded_magazines');
            $table->string('primary_weapon', 64);
            $table->text('primary_weapon_items');
            $table->string('secondary_weapon', 64);
            $table->text('secondary_weapon_items');
            $table->string('uniform', 64);
            $table->text('uniform_items');
            $table->text('uniform_magazines');
            $table->text('uniform_weapons');
            $table->string('vest', 64);
            $table->text('vest_items');
            $table->text('vest_magazines');
            $table->text('vest_weapons');
            $table->dateTime('last_updated_at');
            $table->text('loadout');

            $table->foreign('account_uid')->references('uid')->on('accounts')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('players');
    }
};
