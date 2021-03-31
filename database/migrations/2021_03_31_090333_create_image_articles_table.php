<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateImageArticlesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('image_articles', function (Blueprint $table) {
            $table->id();
            $table->string('img');
            $table->bigInteger('arcticle_id')->unsigned();
            $table->foreign('arcticle_id')->references('id')->on('arcticles')->onDelete('cascade');
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
        Schema::dropIfExists('image_articles');
    }
}
