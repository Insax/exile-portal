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
        Schema::create('safe_zone_logs', function (Blueprint $table) {
            $table->unsignedBigInteger('id')->primary();
            $table->string('action');
            $table->string('account_uid', 17);
            $table->foreignId('clan_id')->nullable()->constrained('clans')->onDelete('cascade');
            $table->string('vehicle');
            $table->foreignId('vehicle_id')->nullable()->constrained('vehicles')->onDelete('cascade');
            $table->string('player_pos');
            $table->string('vehicle_pos');
            $table->string('vehicle_owner_uid', 17)->nullable();
            $table->foreignId('vehicle_owner_clan_id')->nullable()->constrained('clans')->onDelete('cascade');
            $table->timestamp('time');

            $table->foreign('account_uid')->references('uid')->on('accounts')->onDelete('cascade');
            $table->foreign('vehicle_owner_uid')->references('uid')->on('accounts')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('safe_zone_logs');
    }
};
