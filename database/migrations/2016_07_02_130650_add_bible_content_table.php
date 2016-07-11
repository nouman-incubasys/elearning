<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddBibleContentTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bible_content', function (Blueprint $table) {
            $table->primary('id');
            $table->integer('b');
            $table->integer('c');
            $table->integer('v');
            $table->string('t');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('bible_content');
    }
}
