<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMuseumLangsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('museum_langs', function (Blueprint $table) {
            // $table->bigIncrements('id');
            $table->bigInteger('lang_id')->unsigned();
            $table->bigInteger('museum_id')->unsigned();

            $table->foreign('lang_id')
                ->references('id')
                ->on('langs')
                ->onDelete('cascade');

            $table->foreign('museum_id')
                ->references('id')
                ->on('museums')
                ->onDelete('cascade');


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
        Schema::dropIfExists('museum_langs');
    }
}