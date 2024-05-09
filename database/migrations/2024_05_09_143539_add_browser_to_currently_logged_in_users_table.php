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
        Schema::table('currently_logged_in_users', function (Blueprint $table) {
            $table->string('browser')->nullable()->unique()->after('session_token');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('currently_logged_in_users', function (Blueprint $table) {
            $table->dropColumn('browser');
        });
    }
};
