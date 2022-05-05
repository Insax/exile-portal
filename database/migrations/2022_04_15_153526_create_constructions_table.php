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
        Schema::create('constructions', function (Blueprint $table) {
            $table->unsignedBigInteger('id')->primary();
            $table->string('class', 64);
            $table->string('account_uid', 17)->nullable();
            $table->dateTime('spawned_at');
            $table->double('position_x');
            $table->double('position_y');
            $table->double('position_z');
            $table->double('direction_x');
            $table->double('direction_y');
            $table->double('direction_z');
            $table->double('up_x');
            $table->double('up_y');
            $table->double('up_z');
            $table->boolean('is_locked');
            $table->string('pin_code', 6);
            $table->unsignedTinyInteger('damage');
            $table->unsignedInteger('territory_id')->nullable();
            $table->dateTime('last_updated_at');
            $table->dateTime('deleted_at')->nullable();
            $table->text('construction_texture')->nullable();
            $table->string('construction_name', 32);
            $table->timestamps();
            $table->softDeletes('trashed_at');

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
        Schema::dropIfExists('constructions');
    }
};
