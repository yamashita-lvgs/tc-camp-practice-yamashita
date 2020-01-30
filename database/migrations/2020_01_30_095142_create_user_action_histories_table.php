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
            $table->bigIncrements('id');
            $table->unsignedInteger('actioned_user_id');
            $table->unsignedInteger('actioning_user_id');
            $table->unsignedInteger('content_id');
            $table->timestamp('actioned_at');
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
        Schema::dropIfExists('user_action_histories');
    }
}
