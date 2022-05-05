<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public $connection = 'portal';
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('territory_members', function (Blueprint $table) {
            $table->foreignId('territory_id')->constrained('territories');
            $table->string('account_uid');
            $table->foreign('account_uid')->references('uid')->on('accounts');
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
