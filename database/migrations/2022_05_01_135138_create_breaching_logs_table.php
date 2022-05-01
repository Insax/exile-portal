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
        Schema::create('breaching_logs', function (Blueprint $table) {
            $table->unsignedBigInteger('id')->primary();
            $table->string('account_uid', 17);
            $table->foreignId('clan_id')->nullable()->constrained('clans')->onDelete('cascade');
            $table->text('action');
            $table->foreignId('construction_id')->nullable()->constrained('constructions')->onDelete('cascade');
            $table->foreignId('territory_id')->nullable()->constrained('territories')->onDelete('cascade');
            $table->text('position');
            $table->text('charge_class');
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
        Schema::dropIfExists('breaching_logs');
    }
};
