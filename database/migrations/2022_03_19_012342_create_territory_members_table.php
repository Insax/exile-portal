<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    protected $connection = 'gameserver';
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('territory_members', function (Blueprint $table) {
            $table->integer('territory_id')->nullable(false)->unsigned();
            $table->string('account_uid', 32)->nullable(false);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('territory_members');
    }
};
