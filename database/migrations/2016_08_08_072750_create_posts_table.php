<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->integer('owner_id')->unsigned();
            $table->foreign('owner_id')
                    ->references('id')
                    ->on('members')
                    ->onUpdate('cascade')
                    ->onDelete('cascade');
            $table->string('title');
            $table->string('content');
            $table->string('img_link');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('posts');
    }
}
