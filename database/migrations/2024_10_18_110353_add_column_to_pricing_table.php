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
        Schema::table('pricings', function (Blueprint $table) {
            $table->string('phoneNo')->nullable()->after('is_default');
            $table->tinyInteger('paymentStatus')->nullable()->after('phoneNo');
            $table->string('paymentDate')->nullable()->after('paymentStatus');
            $table->string('paymentScreenshot')->nullable()->after('paymentDate');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('pricings', function (Blueprint $table) {
            //
        });
    }
};
