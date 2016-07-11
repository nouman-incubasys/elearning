<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddBibleBookEnglish extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bible_chapter', function (Blueprint $table) {
            $table->primary('b')->comment('Book #');
            $table->string('n')->comment('Name #');
            $table->string('t')->comment('Which Testament this book is in');
            $table->string('g')->comment('A Genre Id is used to define which type of book this is');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('bible_chapter');
    }
}
