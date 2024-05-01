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
        Schema::table('documents', function (Blueprint $table) {
                // Check if foreign key constraint exists before dropping it
                $foreignKeys = collect(DB::select("
                    SELECT
                        CONSTRAINT_NAME
                    FROM
                        information_schema.KEY_COLUMN_USAGE
                    WHERE
                        TABLE_SCHEMA = DATABASE() AND
                        TABLE_NAME = 'documents' AND
                        COLUMN_NAME = 'post_id' AND
                        CONSTRAINT_NAME LIKE 'fk_%'
                "))->pluck('CONSTRAINT_NAME')->toArray();

                foreach ($foreignKeys as $foreignKey) {
                    $table->dropForeign($foreignKey);
                }

                // Make the post_id column nullable
                $table->unsignedBigInteger('post_id')->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('documents', function (Blueprint $table) {
            // Add the foreign key constraint back
            $table->foreign('post_id')->references('id')->on('posts');

            // Revert the column to not nullable if needed
            $table->unsignedBigInteger('post_id')->nullable(false)->change();
        });
    }
};
