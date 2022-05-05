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
        Schema::create('vehicles', function (Blueprint $table) {
            $table->unsignedBigInteger('id')->primary();
            $table->string('class', 64);
            $table->dateTime('spawned_at');
            $table->string('account_uid', 17)->nullable();
            $table->boolean('is_locked');
            $table->double('fuel');
            $table->double('damage');
            $table->text('hitpoints')->nullable();
            $table->double('position_x');
            $table->double('position_y');
            $table->double('position_z');
            $table->double('direction_x');
            $table->double('direction_y');
            $table->double('direction_z');
            $table->double('up_x');
            $table->double('up_y');
            $table->double('up_z');
            $table->text('cargo_items')->nullable();
            $table->text('cargo_magazines')->nullable();
            $table->text('cargo_weapons')->nullable();
            $table->text('cargo_container')->nullable();
            $table->dateTime('last_updated_at');
            $table->string('pin_code', 6);
            $table->dateTime('deleted_at')->nullable();
            $table->unsignedInteger('money');
            $table->text('vehicle_texture')->nullable();
            $table->unsignedInteger('territory_id')->nullable();
            $table->string('nickname', 64);
            $table->string('tuning_data', 300);
            $table->text('exile_loading');
            $table->text('inventory');
            $table->text('marxet_id')->nullable();
            $table->timestamps();
            $table->softDeletes('trashed_at');

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
        Schema::dropIfExists('vehicles');
    }
};
