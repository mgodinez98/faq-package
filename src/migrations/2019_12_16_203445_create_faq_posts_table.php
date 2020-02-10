<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFaqPostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('faq_posts', function (Blueprint $table) {
            $table->increments('id');
            $table->bigInteger('author_id')->unsigned();
            $table->string('author_type');
            $table->string('title');
            $table->longText('body');
            $table->string('slug')->nullable();
            $table->boolean('active');
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
        Schema::dropIfExists('faq_posts');
    }
}
