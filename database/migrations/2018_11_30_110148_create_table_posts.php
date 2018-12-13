<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTablePosts extends Migration
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
            $table->integer('author_id')->unsigned();
             $table->integer('type_id')->unsigned();
            $table->string('title');
            $table->longText('content');
            $table->text('image');
            $table->integer('comment_count')->unsigned();
            $table->integer('status')->unsigned()->default(1);
            $table->dateTime('published_at');
            $table->timestamps();
            $table->foreign('author_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('type_id')->references('id')->on('types')->onDelete('cascade');
            DB::statement('ALTER TABLE posts ADD FULLTEXT `search` (`title`, `content`, `image`)');
            DB::statement('ALTER TABLE posts ENGINE = MyISAM');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('table_posts');
    }
}
