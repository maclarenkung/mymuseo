<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFloorImagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('floor_images', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('floor_id')->unsigned();
            $table->foreign('floor_id')
                ->references('id')
                ->on('floors')
                ->onDelete('cascade');

            $table->string('image_url')->nullable();
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
        Schema::dropIfExists('floor_images');
    }
}
