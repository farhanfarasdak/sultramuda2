<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDataMembersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('data_members', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('universitas');
            $table->string('angkatan');
            $table->string('email')->unique();
            $table->foreign('email')
                    ->references('email')
                    ->on('members')
                    ->onUpdate('cascade')
                    ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('data_members');
    }
}
