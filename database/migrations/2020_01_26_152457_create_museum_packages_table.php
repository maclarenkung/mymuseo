<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMuseumPackagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('museum_packages', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('museum_id')->unsigned();
            $table->foreign('museum_id')
                ->references('id')
                ->on('museums')
                ->onDelete('cascade');
            $table->bigInteger('package_id');
            $table->timestamp('expiry_date')->nullable();
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
        Schema::dropIfExists('museum_packages');
    }
}
