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
    // TODO 機能開発優先のため、マイグレーションファイルは後で修正を行う。
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {

            $table->increments('id')->comment("ID");
            $table->string('login_id',255)->comment("ログインID");
            $table->string('password',255)->comment("パスワード");
            $table->tinyInteger('role_id')->comment("ロールID");
            $table->string('last_name',255)->comment("姓");
            $table->string('first_name',255)->comment("名");
            $table->string('last_name_kana',255)->comment("セイ");
            $table->string('first_name_kana',255)->comment("メイ");
            $table->tinyInteger('gender_id')->comment("性別ID");
            $table->string('mail', 255)->unique()->comment("メールアドレス");
            $table->tinyInteger('created_user_id')->comment("作成ユーザーID");
            $table->timestamp('created_user_at')->comment("作成日");
            $table->tinyInteger('updated_user_id')->comment("最終更新ユーザーID");
            $table->timestamp('updated_at')->comment("更新日");
            $table->tinyInteger('deleted_user_id')->nullable()->comment("削除ユーザーID");
            $table->timestamp('deleted_at')->nullable()->comment("削除日");
            $table->rememberToken()->comment("Eloquent認証ドライバー使用");
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
