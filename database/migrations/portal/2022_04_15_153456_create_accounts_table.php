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
        Schema::create('accounts', function (Blueprint $table) {
            $table->string('uid', 17)->primary();
            $table->unsignedBigInteger('clan_id')->nullable();
            $table->string('name', 64);
            $table->integer('score');
            $table->unsignedInteger('kills');
            $table->unsignedInteger('deaths');
            $table->integer('locker');
            $table->dateTime('first_connect_at');
            $table->dateTime('last_connect_at');
            $table->dateTime('last_disconnect_at')->nullable();
            $table->unsignedInteger('total_connections');
            $table->unsignedInteger('whitelisted');
            $table->dateTime('last_reward_at');
            $table->integer('exp_level');
            $table->integer('exp_total');
            $table->integer('exp_perkPoints');
            $table->text('exp_perks')->nullable();
            $table->text('loadouts');
            $table->unsignedInteger('forum_reward');
            $table->dateTime('last_abandoned_at');
            $table->string('owns_virtualgarage', 6);
            $table->string('enemy_territory_logout', 6);
            $table->dateTime('esm_reward');
            $table->integer('marxet_locker');
            $table->string('friends', 2048);
            $table->dateTime('friend_last_reset_at');
            $table->dateTime('premium_date');
            $table->dateTime('CotW_date');
            $table->dateTime('PremiumDrop_date');
            $table->dateTime('last_updated_at');
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
        Schema::dropIfExists('accounts');
    }
};
