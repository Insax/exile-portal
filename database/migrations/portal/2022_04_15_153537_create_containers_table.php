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
        Schema::create('containers', function (Blueprint $table) {
            $table->unsignedBigInteger('id')->primary();
            $table->string('class', 64);
            $table->dateTime('spawned_at');
            $table->string('account_uid', 17)->nullable();
            $table->boolean('is_locked');
            $table->double('position_x');
            $table->double('position_y');
            $table->double('position_z');
            $table->double('direction_x');
            $table->double('direction_y');
            $table->double('direction_z');
            $table->double('up_x');
            $table->double('up_y');
            $table->double('up_z');
            $table->text('cargo_items');
            $table->text('cargo_magazines');
            $table->text('cargo_weapons');
            $table->text('cargo_container');
            $table->dateTime('last_updated_at');
            $table->string('pin_code', 6);
            $table->unsignedInteger('territory_id')->nullable();
            $table->dateTime('deleted_at')->nullable();
            $table->unsignedInteger('money');
            $table->dateTime('abandoned')->nullable();
            $table->text('inventory');
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
        Schema::dropIfExists('containers');
    }
};
