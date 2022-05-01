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
        Schema::create('inmate_market_logs', function (Blueprint $table) {
            $table->unsignedBigInteger('id')->primary();
            $table->string('buyer_account_uid', 17);
            $table->string('seller_account_uid', 17);
            $table->string('item_class');
            $table->integer('price');
            $table->timestamp('time');

            $table->foreign('buyer_account_uid')->references('uid')->on('accounts')->onDelete('cascade');
            $table->foreign('seller_account_uid')->references('uid')->on('accounts')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('inmate_market_logs');
    }
};
