<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePosterTagPivot extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('poster_tag_pivot', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('poster_id')->unsigned()->index();
            $table->integer('tag_id')->unsigned()->index();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::drop('poster_tag_pivot');
    }
}