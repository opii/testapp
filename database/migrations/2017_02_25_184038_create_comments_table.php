<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCommentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('comments', function (Blueprint $table) {
            $table->increments('id');
            $table->boolean('visible');
            $table->string('text');
            $table->timestamps();
            $table->integer('thread_id')->unsigned();
            $table->integer('reply_to')->nullable()->unsigned();
            $table->foreign('thread_id')->references('id')->on('threads');
            $table->foreign('reply_to')->references('id')->on('comments');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('comments');
    }
}
