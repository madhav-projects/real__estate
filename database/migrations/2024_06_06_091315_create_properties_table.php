<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePropertiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('properties', function (Blueprint $table) {
            $table->id();

            $table->string('property_type');
            $table->string('selling_type');
            $table->string('bhk');
            $table->string('bedroom');
            $table->string('bathroom');
            $table->string('kitchen');
            $table->string('balcony');
            $table->string('hall');
            $table->string('floor');
            $table->string('total_floor');
            $table->string('area_size');
            $table->string('city');
            $table->string('state');
            $table->string('address');
            $table->string('image1');
            $table->string('image2');
            $table->string('image3');
            $table->string('image4');
            $table->string('status');
            $table->string('floor_plan');
            $table->string('ground_floor_plan');
            $table->string('basement_floor_plan');
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
        Schema::dropIfExists('properties');
    }
}
