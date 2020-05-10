<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateChatMessagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('chat_messages', function (Blueprint $table) {
           $table->increments('id');
            $table->unsignedInteger('discussion_id');
            $table->unsignedInteger('sender_id');
            $table->string('content');
            $table->integer('parent_id');
            $table->date('receiver_date');
            $table->date('sender_delete_date');
            $table->date('receiver_delete_date');
            $table->date('viewed_date');
            $table->string('file');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('chat_messages');
    }
}
