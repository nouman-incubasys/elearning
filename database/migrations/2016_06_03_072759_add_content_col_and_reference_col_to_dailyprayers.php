<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddContentColAndReferenceColToDailyprayers extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('dailyprayers', function ($table) {
            $table->text('content');
            $table->string('reference');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('dailyprayers', function ($table) {
            $table->dropColumn('content');
            $table->dropColumn('reference');
        });
    }
}
