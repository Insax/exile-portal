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
        Schema::create('virtual_garage_logs', function (Blueprint $table) {
            $table->unsignedBigInteger('id')->primary();
            $table->string('action');
            $table->string('account_uid', 17);
            $table->foreignId('clan_id')->nullable()->constrained('clans')->onDelete('cascade');
            $table->string('vehicle_class');
            $table->foreignId('vehicle_id')->constrained('vehicles')->onDelete('cascade');
            $table->string('vehicle_pos');
            $table->string('nickname');
            $table->foreignId('territory_id')->constrained('territories')->onDelete('cascade');
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
        Schema::dropIfExists('virtual_garage_logs');
    }
};
