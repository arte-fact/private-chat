<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserConversationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_conversations', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();

            $table->dateTime('read_at')->nullable();

            $table->integer('conversation_id')->unsigned();
            $table->foreign('conversation_id')
                ->references('id')->on('conversations');

            $table->integer('user_id')->unsigned();
            $table->foreign('user_id')
                ->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('user_conversations');
    }
}
