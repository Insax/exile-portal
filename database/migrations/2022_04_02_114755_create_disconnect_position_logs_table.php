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
        Schema::create('disconnect_position_logs', function (Blueprint $table) {
            $table->id();
            $table->portalId();
            $table->uid();
            $table->string('position');
            $table->boolean('alive');
            $table->integer('territory_id')->nullable();
            $table->boolean('build_rights')->nullable();
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
        Schema::dropIfExists('disconnect_position_logs');
    }
};
