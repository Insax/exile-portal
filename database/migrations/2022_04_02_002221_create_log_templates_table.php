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
        Schema::create('log_templates', function (Blueprint $table) {
            $table->id();
            $table->string('log_name');
            $table->integer('argument_count');
            $table->longText('template');
            $table->unique(['log_name', 'argument_count']);
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
        Schema::dropIfExists('log_templates');
    }
};
