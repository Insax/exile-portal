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
        Schema::create('container_pack_logs', function (Blueprint $table) {
            $table->unsignedBigInteger('id')->primary();
            $table->string('account_uid', 17);
            $table->foreignId('clan_id')->nullable()->constrained('clans')->onDelete('cascade');
            $table->foreignId('container_id')->nullable()->constrained('containers')->onDelete('cascade');
            $table->text('container_pos');
            $table->foreignId('territory_id')->nullable()->constrained('territories')->onDelete('cascade');
            $table->boolean('build_rights');
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
        Schema::dropIfExists('container_pack_logs');
    }
};
