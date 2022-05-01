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
        Schema::create('marxets', function (Blueprint $table) {
            $table->string('listingID', 8)->index()->primary();
            $table->boolean('itemAvailable')->default(1);
            $table->text('itemArray');
            $table->double('price');
            $table->string('sellerUID', 17);
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('sellerUID')->references('uid')->on('accounts');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('marxets');
    }
};
