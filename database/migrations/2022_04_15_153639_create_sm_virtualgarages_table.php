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
        Schema::create('sm_virtualgarages', function (Blueprint $table) {
            $table->unsignedBigInteger('id')->primary();
            $table->string('class', 64);
            $table->string('puid', 32);
            $table->string('owner_uid', 17);
            $table->text('textures');
            $table->text('poptabs');
            $table->string('pincode', 6)->default('[]');
            $table->text('damage');
            $table->text('hitpoints');
            $table->double('fuel');
            $table->text('items');
            $table->text('magazines');
            $table->text('weapons');
            $table->text('cargo');
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('owner_uid')->references('uid')->on('accounts');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sm_virtualgarages');
    }
};
