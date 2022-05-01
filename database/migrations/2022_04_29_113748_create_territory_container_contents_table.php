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
        Schema::create('territory_container_contents', function (Blueprint $table) {
            $table->id();
            $table->foreignId('territory_id')->constrained('territories')->onDelete('cascade');
            $table->string('item')->nullable(false);
            $table->integer('count')->nullable(false)->unsigned();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('territory_container_contents');
    }
};
