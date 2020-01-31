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
            $table->increments('id');
            $table->string('login_id',255)->comment("ログインID");
            $table->string('password',255)->comment("パスワード");
            $table->string('last_name',255)->comment("姓");
            $table->string('first_name',255)->comment("名");
            $table->string('last_name_kana',255)->comment("セイ");
            $table->string('first_name_kana',255)->comment("メイ");
            $table->tinyInteger('gender_id')->comment("性別");
            $table->string('email', 255)->unique()->comment("メールアドレス");
            $table->tinyInteger('created_user_id')->comment("作成ユーザーID");
            $table->timestamp('created_user_id')->comment("作成日");
            $table->tinyInteger('updated_user_id')->comment("最終更新ユーザーID");
            $table->timestamp('updated_at')->comment("更新日");
            $table->tinyInteger('deleted_user_id')->comment("削除ユーザーID");
            $table->timestamp('deleted_at')->comment("削除日");
            $table->rememberToken();
        });
    DB::statement("ALTER TABLE users COMMENT 'ユーザー'");
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
