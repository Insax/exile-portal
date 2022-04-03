<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('anti_t_p_logs', function (Blueprint $table) {
            $table->id();
            $table->portalId();
            $table->string('action');
            $table->uid();
            $table->string('vehicle_class');
            $table->integer('distance');
            $table->float('movement_time');
            $table->string('position_before');
            $table->string('position_after');
            $table->integer('speed_horizontal');
            $table->integer('speed_vertical');
            $table->integer('tp_count');
            $table->dateTime('time');
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
        Schema::dropIfExists('anti_t_p_logs');
    }
};
