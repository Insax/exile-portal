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
        Schema::create('family_logs', function (Blueprint $table) {
            $table->id();
            $table->portalId();
            $table->string('action');
            $table->uid();
            $table->integer('clan_id')->nullable();
            $table->boolean('accepted');
            $table->uid('inviter');
            $table->integer('inviter_clan_id');
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
        Schema::dropIfExists('family_logs');
    }
};
