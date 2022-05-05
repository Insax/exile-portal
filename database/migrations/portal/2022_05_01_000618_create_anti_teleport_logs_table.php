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
        Schema::create('anti_teleport_logs', function (Blueprint $table) {
            $table->unsignedBigInteger('id')->primary();
            $table->string('account_uid', 17);
            $table->string('vehicle_class')->nullable();
            $table->integer('distance');
            $table->string('old_pos');
            $table->string('new_pos');
            $table->integer('tp_count');
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
        Schema::dropIfExists('anti_teleport_logs');
    }
};
