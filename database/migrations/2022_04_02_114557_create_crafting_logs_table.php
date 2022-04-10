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
        Schema::create('crafting_logs', function (Blueprint $table) {
            $table->id();
            $table->portalId();
            $table->integer('clan_id')->nullable();
            $table->uid();
            $table->integer('amount');
            $table->string('recipe_class');
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
        Schema::dropIfExists('crafting_logs');
    }
};
