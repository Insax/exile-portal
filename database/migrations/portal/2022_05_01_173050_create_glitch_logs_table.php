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
        Schema::create('glitch_logs', function (Blueprint $table) {
            $table->unsignedBigInteger('id')->primary();
            $table->string('account_uid', 17);
            $table->string('action');
            $table->foreignId('construction_id')->constrained('constructions')->onDelete('cascade');
            $table->string('pos');
            $table->timestamp('time')->useCurrent();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('glitch_logs');
    }
};
