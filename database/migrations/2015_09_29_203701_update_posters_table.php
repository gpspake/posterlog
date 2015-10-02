<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpdatePostersTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::table('posters', function (Blueprint $table) {
            $table->renameColumn('description', 'notes');
            $table->dropColumn('dimensions');
            $table->text('dimension_height')->after('image');
            $table->text('dimension_width')->after('dimension_height');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::table('posters', function (Blueprint $table) {
            $table->dropColumn('dimension_width');
            $table->dropColumn('dimension_height');
            $table->string('dimensions')->after('image');
            $table->renameColumn('notes', 'description');
        });
    }
}