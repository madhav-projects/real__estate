<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGeneratesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('generates', function (Blueprint $table) {
            $table->id();
           
                $table->string('company_name'); // Company name
                $table->string('agent_name'); // Agent name
                $table->decimal('price'); // Price
                $table->decimal('admin_share'); // Admin share
                $table->decimal('company_share'); // Company share
                $table->decimal('agent_share'); // Agent share
                $table->decimal('user_share'); // User share
               
           
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
        Schema::dropIfExists('generates');
    }
}
