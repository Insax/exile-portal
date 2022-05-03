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
        Schema::create('trade_logs', function (Blueprint $table) {
            $table->unsignedBigInteger('id')->primary();
            $table->string('action');
            $table->string('account_uid', 17);
            $table->foreignId('clan_id')->nullable();
            $table->string('item_class')->nullable();;
            $table->integer('quantity')->nullable();;
            $table->foreignId('vehicle_id')->nullable()->constrained('vehicles');
            $table->text('container_content')->nullable();;
            $table->integer('price')->nullable();;
            $table->integer('sell_respect')->nullable();
            $table->integer('poptabs_after');
            $table->integer('respect_after');
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
        Schema::dropIfExists('trade_logs');
    }
};
