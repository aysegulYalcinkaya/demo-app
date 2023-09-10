<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePlacesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('places', function (Blueprint $table) {
            $table->id();
            $table->string('establishment');
            $table->string('address');
            $table->string('neighbourhood');
            $table->string('city');
            $table->string('postal_code');
            $table->string('type');
            $table->boolean('inside');
            $table->boolean('outside');
            $table->boolean('water_available');
            $table->string('images');
            // Add any additional columns as needed
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
        Schema::dropIfExists('places');
    }
}
