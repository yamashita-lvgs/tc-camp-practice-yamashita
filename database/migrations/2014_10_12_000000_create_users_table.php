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
            $table->bigIncrements('id');
            $table->string('login_id');
            $table->string('password');
            $table->string('last_name');
            $table->string('first_name');
            $table->string('last_name_kana');
            $table->string('first_name_kana');
            $table->integer('gender_id');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->integer('login_status_id')->references('id')->on('login_statuses');
            $table->integer('create_user_id')->references('id')->on('create_users');
            $table->integer('update_user_id')->references('id')->on('update_users');
            $table->integer('delete_user_id')->references('id')->on('delete_users')->nullable();
            $table->rememberToken();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
