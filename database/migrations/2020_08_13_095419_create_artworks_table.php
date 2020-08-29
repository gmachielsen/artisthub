<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateArtworksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('artworks', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('user_id');
            $table->string('artist_id');
            $table->string('picture');
            $table->string('title');
            $table->string('orientation');
            $table->string('width');
            $table->string('height');
            $table->string('price');
            $table->string('rent');
            $table->string('slug');
            $table->text('description');
            $table->string('technic_id');
            $table->string('style_id');
            $table->string('category_id');
            $table->integer('status');
            $table->integer('year');
            $table->string('framed');
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
        Schema::dropIfExists('artworks');
    }
}
