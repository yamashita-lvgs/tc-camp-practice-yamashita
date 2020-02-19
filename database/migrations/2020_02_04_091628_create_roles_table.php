<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRolesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('roles', function (Blueprint $table) {
            $table->increments('id')->comment("ID");
            $table->unsignedInteger('sort')->comment("ソート");
            $table->string('name',255)->comment("役割");
            $table->unsignedInteger('created_user_id')->comment("作成ユーザーID");
            $table->timestamp('created_at')->comment("作成日時");
            $table->unsignedInteger('updated_user_id')->comment("最終更新ユーザーID");
            $table->timestamp('updated_at')->comment("更新日時");
            $table->unsignedInteger('deleted_user_id')->nullable()->comment("削除ユーザーID");
            $table->timestamp('deleted_at')->nullable()->comment("削除日時");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('roles');
    }
}
