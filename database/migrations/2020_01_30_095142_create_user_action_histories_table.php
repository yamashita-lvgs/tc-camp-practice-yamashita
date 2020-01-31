<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserActionHistoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_action_histories', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('actioned_user_id')->comment("操作対象ユーザーID");
            $table->unsignedInteger('actioning_user_id')->comment("操作実施ユーザーID");
            $table->unsignedInteger('content_id')->comment("操作種別ID");
            $table->timestamp('actioned_at')->comment("操作日時");;
            $table->rememberToken();
        });
        DB::statement("ALTER TABLE user_action_histories COMMENT '操作履歴'");
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
