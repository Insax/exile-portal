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
        Schema::create('chat_logs', function (Blueprint $table) {
            $table->unsignedBigInteger('id')->primary();
            $table->string('sender_uid', 17);
            $table->string('recipient_uid', 17);
            $table->text('message');
            $table->timestamp('time');

            $table->foreign('sender_uid')->references('uid')->on('accounts')->onDelete('cascade');
            $table->foreign('recipient_uid')->references('uid')->on('accounts')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('chat_logs');
    }
};
