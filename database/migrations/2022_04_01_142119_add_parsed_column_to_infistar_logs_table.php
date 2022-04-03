<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * The name of the database connection to use.
     *
     * @var string|null
     */
    public $connection = 'gameserver';

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('infistar_logs', function (Blueprint $table) {
            $table->boolean('parsed')->default(0);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('infistar_logs', function (Blueprint $table) {
            $table->dropColumn('parsed');
        });
    }
};
