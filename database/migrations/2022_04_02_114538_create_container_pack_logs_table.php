<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('container_pack_logs', function (Blueprint $table) {
            $table->id();
            $table->portalId();
            $table->integer('clan_id')->nullable();
            $table->uid();
            $table->string('object_class');
            $table->string('position');
            $table->integer('territory_id');
            $table->boolean('build_rights');
            $table->timestamps();
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
