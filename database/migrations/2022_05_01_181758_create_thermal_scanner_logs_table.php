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
        Schema::create('thermal_scanner_logs', function (Blueprint $table) {
            $table->unsignedBigInteger('id')->primary();
            $table->string('account_uid', 17);
            $table->foreignId('clan_id')->nullable();
            $table->morphs('scanable');
            $table->string('pin_code', 6);
            $table->string('player_pos');
            $table->foreignId('territory_id')->nullable()->constrained('territories')->onDelete('cascade');
            $table->boolean('has_rights')->nullable();
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
        Schema::dropIfExists('thermal_scanner_logs');
    }
};
