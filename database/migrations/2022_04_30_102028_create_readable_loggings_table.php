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
        Schema::create('readable_loggings', function (Blueprint $table) {
            $table->id();
            $table->string('type');
            $table->string('account_uid');
            $table->foreignId('clan_id')->nullable()->constrained('clans')->onDelete('cascade');
            $table->foreignId('territory_id')->nullable()->constrained('territories')->onDelete('cascade');
            $table->morphs('loggable');

            $table->timestamps();
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
        Schema::dropIfExists('readable_loggings');
    }
};
