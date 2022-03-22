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
        Schema::create('parsed_player_money', function (Blueprint $table) {
            $table->id();
            $table->foreignId('portal_instance_id')->constrained('portal_instances')->onDelete('cascade');
            $table->string('account_uid');
            $table->integer('locker_money');
            $table->integer('marxet_money');
            $table->integer('container_money');
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
        Schema::dropIfExists('parsed_player_money');
    }
};
