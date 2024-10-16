<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('auctions', function (Blueprint $table) {
            $table->id();
            $table->string('creator_id')->comment('ID Of Firebase User');
            $table->string('auction_name');
            $table->date('auction_date');
            $table->time('auction_time');
            $table->integer('points_par_team');
            $table->integer('min_bid');
            $table->integer('bid_increase_by');
            $table->integer('player_per_team');
            $table->string('venue')->nullable();
            $table->string('play_type');
            $table->string('auction_code')->nullable();
            $table->string('auction_image')->nullable();
            $table->boolean('player_registration')->default(true);
            
            $table->unsignedBigInteger('current_auction_team_id')->nullable();
            $table->unsignedBigInteger('current_auction_player_id')->nullable();
            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('auctions');
    }
};
