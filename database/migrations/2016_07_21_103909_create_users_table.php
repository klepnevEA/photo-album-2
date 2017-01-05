<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('email', 128)->unique();
            $table->string('name', 32);
            $table->string('surname', 32)->nullable();
            $table->string('about', 512)->nullable();
            $table->string('social_vk', 256)->nullable();
            $table->string('social_fb', 256)->nullable();
            $table->string('social_tw', 256)->nullable();
            $table->string('social_g', 256)->nullable();
            $table->string('avatar_path');
            $table->string('avatar_url');
            $table->string('background_path');
            $table->string('background_url');
            $table->boolean('is_active')->default(false);
            $table->string('activation_code');
            $table->string('password', 128);
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('users');
    }
}
