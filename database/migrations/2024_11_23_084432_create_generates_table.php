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
            $table->id(); // Primary key
            $table->string('company_name');
            $table->string('agent_name');
            $table->decimal('price', 10, 2);
            $table->decimal('admin_share', 10, 2);
            $table->decimal('company_share', 10, 2);
            $table->decimal('agent_share', 10, 2);
            $table->decimal('user_share', 10, 2);

            // Add foreign keys with nullable
            $table->foreignId('user_id')->nullable()->constrained('users')->onDelete('cascade');
            $table->foreignId('company_id')->nullable()->constrained('companies')->onDelete('cascade');
            $table->foreignId('agent_id')->nullable()->constrained('agents')->onDelete('cascade');
            $table->foreignId('admin_id')->nullable()->constrained('admins')->onDelete('cascade');

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
