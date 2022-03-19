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
        Schema::create('parsed_daily_reward_logs', function (Blueprint $table) {
            $table->id();
            $table->foreignId('portal_instance_id')->constrained('portal_instances');
            $table->string('account_uid', 32)->nullable(false);
            $table->string('reward')->nullable(false);
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
        Schema::dropIfExists('parsed_daily_reward_logs');
    }
};
