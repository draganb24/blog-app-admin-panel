<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('posts', function (Blueprint $table) {
                        // Check if foreign key constraint exists before dropping it
                        $foreignKeys = collect(DB::select("
                        SELECT
                            CONSTRAINT_NAME
                        FROM
                            information_schema.KEY_COLUMN_USAGE
                        WHERE
                            TABLE_SCHEMA = DATABASE() AND
                            TABLE_NAME = 'posts' AND
                            COLUMN_NAME = 'image_id'
                    "))->pluck('CONSTRAINT_NAME')->toArray();

        foreach ($foreignKeys as $foreignKey) {
            $table->dropForeign($foreignKey);
        }

        $table->unsignedBigInteger('image_id')->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('posts', function (Blueprint $table) {
            if (!DB::table('posts')->whereNull('image_id')->exists()) {
                $table->unsignedBigInteger('image_id')->nullable(false)->change();
            }
        });
    }
};
