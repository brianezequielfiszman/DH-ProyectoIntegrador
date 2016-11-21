<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMessagesTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('messages', function (Blueprint $table) {
            $table->increments('id');
            $table->text('text');
            $table->integer('book_recipient_id')->unsigned();
            $table->integer('user_origin_id')->unsigned();
            $table->foreign('book_recipient_id')->references('id')->on('books');
            $table->foreign('user_origin_id')->references('id')->on('users');
            $table->timestamps();
            /*
            * $table->integer('reply_id')->unsigned();
            * $table->foreign('reply_id')->references('id')->on('reply');
            */
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::dropIfExists('messages');
    }
}
