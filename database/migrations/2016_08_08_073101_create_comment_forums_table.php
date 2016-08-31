<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCommentForumsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('comment_forums', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->integer('owner_id')->unsigned();
            $table->foreign('owner_id')
                    ->references('id')
                    ->on('members')
                    ->onUpdate('cascade')
                    ->onDelete('cascade');
            $table->integer('room_forum')->unsigned();
            $table->foreign('room_forum')
                    ->references('id')
                    ->on('forums')
                    ->onUpdate('cascade')
                    ->onDelete('cascade');
            $table->string('comment');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('comment_forums');
    }
}
