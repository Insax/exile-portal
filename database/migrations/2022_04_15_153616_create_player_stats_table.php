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
        Schema::create('player_stats', function (Blueprint $table) {
            $table->unsignedBigInteger('id')->primary();
            $table->string('killer', 17)->nullable();
            $table->string('victim', 17)->nullable();
            $table->string('weaponused', 50)->nullable();
            $table->integer('distance')->nullable();
            $table->integer('bambikill')->nullable();
            $table->integer('raidkill')->nullable();
            $table->integer('territorykill')->nullable();
            $table->text('killer_position');
            $table->text('victim_position');
            $table->dateTime('time')->nullable();
            $table->foreign('killer')->references('uid')->on('accounts');
            $table->foreign('victim')->references('uid')->on('accounts');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('player_stats');
    }
};
