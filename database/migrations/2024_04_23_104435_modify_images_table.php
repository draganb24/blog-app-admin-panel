<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ModifyImagesTable extends Migration
{
    public function up()
    {
        Schema::table('images', function (Blueprint $table) {
            $table->unsignedBigInteger('post_id')->nullable()->change();
        });
    }

    public function down()
    {
        Schema::table('images', function (Blueprint $table) {
        });
    }
}

