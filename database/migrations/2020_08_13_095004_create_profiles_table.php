<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProfilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('profiles', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('user_id');
            $table->string('gender');
            $table->string('first_name');
            $table->string('last_name');
            $table->string('phone');
            $table->string('cell_phone');
            $table->string('email');
            $table->string('full_name');
            $table->string('postal_code');
            $table->string('street_name');
            $table->string('house_number');
            $table->string('further_address_information');
            $table->string('city');
            $table->string('state');
            $table->string('country');


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
        Schema::dropIfExists('profiles');
    }
}
