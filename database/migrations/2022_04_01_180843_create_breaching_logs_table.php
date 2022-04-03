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
        Schema::create('breaching_logs', function (Blueprint $table) {
            $table->id();
            $table->portalId();
            $table->enum('action', ['STARTED', 'PLANTED']);
            $table->integer('clan_id')->nullable();
            $table->uid();
            $table->string('object_class');
            $table->integer('territory_id');
            $table->string('position');
            $table->string('charge_used');
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
        Schema::dropIfExists('breaching_logs');
    }
};
