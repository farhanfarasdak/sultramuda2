<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCommentPostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('comment_posts', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->integer('post_id')->unsigned();
            $table->foreign('post_id')
                    ->references('id')
                    ->on('posts')
                    ->onUpdate('cascade')
                    ->onDelete('cascade');
            $table->integer('owner_id')->unsigned();
            $table->foreign('owner_id')
                    ->references('id')
                    ->on('members')
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
        Schema::drop('comment_posts');
    }
}
