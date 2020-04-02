<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

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
            $table->id();

            $table->string('name');
            $table->string('nickname')->nullable();
            $table->string('email')->unique();

            $table->string('facebook_id')->unique();
            $table->string('facebook_avatar')->unique();
            $table->string('facebook_token');
            $table->string('facebook_refresh_token')->nullable();
            $table->integer('facebook_expires_in');

            $table->rememberToken();
            $table->timestamps();
        });
    }
}
