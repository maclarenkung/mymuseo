<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFloorTranslationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('floor_translations', function (Blueprint $table) {
            $table->bigInteger('lang_id')->unsigned();
            $table->foreign('lang_id')
                ->references('id')
                ->on('langs')
                ->onDelete('cascade');

            $table->bigInteger('floor_id')->unsigned();


            $table->foreign('floor_id')
                ->references('id')
                ->on('floors')
                ->onDelete('cascade');

            $table->string('name');
            $table->text('description');
            $table->text('audio_url')->nullable();
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
        Schema::dropIfExists('floor_translations');
    }
}
