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
            $table->string('login_id',32);
            $table->string('password',32);
            $table->string('last_name',20);
            $table->string('first_name',20);
            $table->string('last_name_kana',20);
            $table->string('first_name_kana',20);
            $table->integer('gender_id');
            $table->string('email', 254)->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->timestamp('created_at');
            $table->timestamp('updated_tat');
            $table->timestamp('deleted_at');
            $table->rememberToken();
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
