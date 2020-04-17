<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMuseumImagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('museum_images', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('museum_id')->unsigned();
            $table->foreign('museum_id')
                ->references('id')
                ->on('museums')
                ->onDelete('cascade');

            $table->string('image_url');
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
        Schema::dropIfExists('museum_images');
    }
}
