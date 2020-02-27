<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLoginHistoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('login_histories', function (Blueprint $table) {
            $table->increments('id')->comment("ID");
            $table->unsignedInteger('user_id')->comment("ユーザーID");
            $table->unsignedInteger('status_id')->comment("ログイン状態");
            $table->timestamp('status_changed_at')->comment("状態変更日時");
            $table->unsignedInteger('created_user_id')->comment("作成ユーザーID");
            $table->timestamp('created_at')->comment("作成日時");
            $table->unsignedInteger('updated_user_id')->comment("最終更新ユーザーID");
            $table->timestamp('updated_at')->comment("最終更新日時");
            $table->unsignedInteger('deleted_user_id')->nullable()->comment("削除ユーザーID");
            $table->timestamp('deleted_at')->nullable()->comment("削除日時");
        });
        DB::statement("ALTER TABLE login_histories COMMENT 'ログイン履歴'");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('login_histories');
    }
}
