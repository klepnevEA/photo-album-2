<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ChangePhotoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('photos', function (Blueprint $table) {
            $table->string('name', 64)->nullable()->change();
            $table->string('description', 512)->nullable()->change();
            $table->string('thumbnail_path')->nullable()->change();
            $table->string('thumbnail_url')->nullable()->change();
            $table->string('image_path')->nullable()->change();
            $table->string('image_url')->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
