<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class RestructurePostersTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::table('posters', function (Blueprint $table) {
            $table->boolean('is_draft')->after('description');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::table('posters', function (Blueprint $table) {
            $table->dropColumn('is_draft');
        });
    }
}