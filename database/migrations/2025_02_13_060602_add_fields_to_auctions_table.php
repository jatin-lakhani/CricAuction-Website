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
        Schema::table('auctions', function (Blueprint $table) {
            $table->string('payment_qr')->nullable();
            $table->string('payment_receipt')->nullable();
            $table->integer('currency_formatting')->nullable()->default(0)->after('current_auction_player_id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('auctions', function (Blueprint $table) {
            $table->dropColumn(['payment_qr', 'payment_receipt', 'currency_formatting']);
        });
    }
};
