<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('players', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('auction_id');
            $table->unsignedBigInteger('team_id')->nullable();
            $table->string('player_id');
            $table->string('player_firstname');
            $table->string('player_mobile_no');
            $table->string('player_age')->nullable();
            $table->string('player_specification_one')->nullable();
            $table->string('player_specification_two')->nullable();
            $table->string('player_specification_three')->nullable();
            $table->string('player_image')->nullable();
            $table->string('crichero_profile_url')->nullable();
            $table->integer('base_value')->default(0);
            $table->integer('sold_value')->nullable();
            $table->boolean('is_team_owner')->default(false);
            $table->boolean('is_non_playing_owner')->default(false);
            $table->string('jersey_name')->nullable();
            $table->string('jersey_number')->nullable();
            $table->string('jersey_size')->nullable();
            $table->string('trouser_size')->nullable();
            $table->string('category')->nullable();
            $table->json('playerSelectedIcon')->nullable();
            $table->string('extra_detail')->nullable();
            $table->timestamps();

            $table->foreign('auction_id')->references('id')->on('auctions')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('players');
    }
};
