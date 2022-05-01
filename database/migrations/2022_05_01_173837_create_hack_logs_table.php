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
        Schema::create('hack_logs', function (Blueprint $table) {
            $table->unsignedBigInteger('id')->primary();
            $table->string('action');
            $table->string('new_account_uid', 17);
            $table->string('old_account_uid', 17);
            $table->timestamp('time');

            $table->foreign('new_account_uid')->references('uid')->on('accounts')->onDelete('cascade');
            $table->foreign('old_account_uid')->references('uid')->on('accounts')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('hack_logs');
    }
};
