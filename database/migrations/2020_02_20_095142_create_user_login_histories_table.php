<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserLoginHistoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_login_histories', function (Blueprint $table) {
            $table->increments('id')->comment("ID");
            $table->unsignedInteger('status_changed_user_id')->comment("ログイン状態変更ユーザーID");
            $table->timestamp('status_changed_at')->comment("ログイン状態変更日時");
            $table->unsignedInteger('status_id')->comment("ログイン状態");
            $table->unsignedInteger('created_user_id')->comment("作成ユーザーID");
            $table->timestamp('created_at')->comment("作成日時");
            $table->unsignedInteger('updated_user_id')->comment("最終更新ユーザーID");
            $table->timestamp('updated_at')->comment("更新日時");
            $table->unsignedInteger('deleted_user_id')->nullable()->comment("削除ユーザーID");
            $table->timestamp('deleted_at')->nullable()->comment("削除日時");
        });
        DB::statement("ALTER TABLE user_login_histories COMMENT 'ログイン履歴'");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('user_login_histories');
    }
}
