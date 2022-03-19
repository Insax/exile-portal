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
        Schema::create('parsed_inmate_market_logs', function (Blueprint $table) {
            $table->id();
            $table->foreignId('portal_instance_id')->constrained('portal_instances');
            $table->string('source_account_uid', 32)->nullable(false)->index();
            $table->string('receiver_account_uid', 32)->nullable(true)->index();
            $table->string('item')->index();
            $table->bigInteger('price');
            $table->dateTime('time');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('parsed_inmate_market_logs');
    }
};
