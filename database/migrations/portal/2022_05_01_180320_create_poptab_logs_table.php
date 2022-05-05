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
        Schema::create('poptab_logs', function (Blueprint $table) {
            $table->unsignedBigInteger('id')->primary();
            $table->string('action');
            $table->string('account_uid', 17);
            $table->foreignId('clan_id')->nullable()->constrained('clans')->onDelete('cascade');
            $table->integer('amount');
            $table->string('container_class');
            $table->integer('container_before');
            $table->integer('container_after');
            $table->integer('player_before');
            $table->integer('player_after');
            $table->string('player_pos');
            $table->timestamp('time');

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
        Schema::dropIfExists('poptab_logs');
    }
};
