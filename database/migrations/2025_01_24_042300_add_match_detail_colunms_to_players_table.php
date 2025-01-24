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
        Schema::table('players', function (Blueprint $table) {
            $table->bigInteger('match')->nullable()->after('is_reserved');
            $table->bigInteger('run')->nullable()->after('match');
            $table->bigInteger('wicket')->nullable()->after('run');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('players', function (Blueprint $table) {
            $table->dropColumn(['match', 'run', 'wicket']);
        });
    }
};
