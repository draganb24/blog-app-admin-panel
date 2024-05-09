<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddSessionTokenToCurrentlyLoggedInUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('currently_logged_in_users', function (Blueprint $table) {
            $table->string('session_token')->nullable()->unique()->after('user_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('currently_logged_in_users', function (Blueprint $table) {
            $table->dropColumn('session_token');
        });
    }
}

