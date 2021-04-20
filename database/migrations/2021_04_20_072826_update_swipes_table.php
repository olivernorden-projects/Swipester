<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateSwipesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('swipes', function (Blueprint $table) {
            $table->dropColumn('subjectItem_id');
            $table->foreignId('subject_item_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('swipes', function (Blueprint $table) {
            $table->foreignId('subjectItem_id');
            $table->dropColumn('subject_item_id');
        });
    }
}
