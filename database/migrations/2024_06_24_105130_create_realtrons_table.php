<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRealtronsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('realtrons', function (Blueprint $table) {
            $table->id();
            $table->string('role')->default('realtron');
            $table->string('username');
            $table->string('realtron_company');
            $table->string('phone');
            $table->string('email');
            $table->string('address');
            $table->string('city');
            $table->string('area');
            $table->string('pincode');
            $table->string('bussiness_phone');
            $table->string('age_of_company');
            $table->string('profile');//profile image here 
            $table->string('upload_file');//licesence pdf
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
        Schema::dropIfExists('realtrons');
    }
}
