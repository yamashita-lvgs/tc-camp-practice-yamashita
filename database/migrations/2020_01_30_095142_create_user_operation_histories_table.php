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
    public function up()
    {
        Schema::create('user_operation_histories', function (Blueprint $table) {
            $table->increments('id')->comment("ID");
            $table->unsignedInteger('operated_user_id')->comment("操作対象ユーザーID");
            $table->unsignedInteger('operating_user_id')->comment("操作実施ユーザーID");
            $table->unsignedInteger('operation_id')->comment("操作種別ID");
            $table->timestamp('operated_at')->comment("操作日時");
            $table->unsignedInteger('created_user_id')->comment("作成ユーザーID");
            $table->timestamp('created_at')->comment("作成日時");
            $table->unsignedInteger('updated_user_id')->comment("最終更新ユーザーID");
            $table->timestamp('updated_at')->comment("更新日時");
            $table->unsignedInteger('deleted_user_id')->nullable()->comment("削除ユーザーID");
            $table->timestamp('deleted_at')->nullable()->comment("削除日時");
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
