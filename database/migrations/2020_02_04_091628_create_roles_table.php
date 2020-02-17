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
    // TODO 機能開発優先のため、マイグレーションファイルは後で修正を行う。
    public function up()
    {
        Schema::create('roles', function (Blueprint $table) {
            $table->increments('id')->comment("ID");
            $table->string('name',255)->comment("役割");
            $table->tinyInteger('sort_id')->comment("ソートID");
            $table->timestamp('created_at')->comment("作成日");
            $table->timestamp('updated_at')->comment("更新日");
            $table->timestamp('deleted_at')->nullable()->comment("削除日");
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
