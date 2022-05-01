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
        Schema::create('player_kill_logs', function (Blueprint $table) {
            $table->unsignedBigInteger('id')->primary();
            $table->string('killer_account_uid', 17);
            $table->foreignId('killer_clan_id')->nullable()->constrained('clans')->onDelete('cascade');
            $table->string('killer_pos');
            $table->string('victim_account_uid', 17);
            $table->foreignId('victim_clan_id')->nullable()->constrained('clans')->onDelete('cascade');
            $table->string('victim_pos');
            $table->timestamp('time');

            $table->foreign('killer_account_uid')->references('uid')->on('accounts')->onDelete('cascade');
            $table->foreign('victim_account_uid')->references('uid')->on('accounts')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('player_kill_logs');
    }
};
