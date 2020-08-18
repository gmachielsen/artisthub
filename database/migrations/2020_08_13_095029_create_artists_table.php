<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateArtistsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('artists', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('user_id');
            $table->string('artist_name');
            $table->string('YearOfBirth');
            $table->string('cover_photo');
            $table->string('profile_photo');
            $table->string('slug');
            $table->string('description');
            $table->string('email');
            $table->string('address');
            $table->string('phone');
            $table->string('website');
            $table->string('company_name');
            $table->string('taxnumber');
            $table->string('businessnumber');
            $table->string('shorttext');
            $table->string('approved');
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
        Schema::dropIfExists('artists');
    }
}
