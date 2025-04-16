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
        Schema::table('sponsors', function (Blueprint $table) {
            $table->unsignedBigInteger('auction_id')->nullable()->after('id');
            $table->foreign('auction_id')->references('id')->on('auctions')->onDelete('cascade');
            $table->index('auction_id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('sponsors', function (Blueprint $table) {
            $table->dropForeign(['auction_id']);
            $table->dropIndex(['auction_id']);
            $table->dropColumn('auction_id');
        });
    }
};
