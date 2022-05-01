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
        Schema::create('territories', function (Blueprint $table) {
            $table->unsignedBigInteger('id')->primary();
            $table->string('esm_custom_id', 45)->nullable();
            $table->string('owner_uid', 17);
            $table->string('name', 64);
            $table->double('position_x');
            $table->double('position_y');
            $table->double('position_z');
            $table->double('radius');
            $table->integer('level');
            $table->string('flag_texture');
            $table->boolean('flag_stolen');
            $table->string('flag_stolen_by_uid', 17)->nullable();
            $table->dateTime('flag_stolen_at')->nullable();
            $table->dateTime('last_paid_at');
            $table->boolean('xm8_protectionmoney_notified');
            $table->unsignedInteger('esm_payment_counter')->nullable();
            $table->dateTime('deleted_at')->nullable();
            $table->string('territory_permissions', 300);
            $table->dateTime('last_updated_at');
            $table->timestamps();
            $table->softDeletes('trashed_at');

            $table->foreign('owner_uid')->references('uid')->on('accounts')->onDelete('cascade');
            $table->foreign('flag_stolen_by_uid')->references('uid')->on('accounts')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('territories');
    }
};
