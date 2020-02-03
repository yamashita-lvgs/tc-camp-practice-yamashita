<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserOperationHistoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    // TODO 機能開発優先のため、マイグレーションファイルは後で修正を行う。
    public function up()
    {
        Schema::create('user_operation_histories', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('operated_user_id')->comment("操作対象ユーザーID");
            $table->unsignedInteger('operating_user_id')->comment("操作実施ユーザーID");
            $table->unsignedInteger('operation_id')->comment("操作種別ID");
            $table->timestamp('operated_at')->comment("操作日時");;
            $table->rememberToken();
        });
        DB::statement("ALTER TABLE user_operation_histories COMMENT '操作履歴'");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('user_action_histories');
    }
}
