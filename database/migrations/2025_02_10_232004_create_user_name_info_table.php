<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('user_basic_name_infos', function (Blueprint $table) {
            $table->id(); 
            $table->string('first_name'); 
            $table->string('middle_name'); 
            $table->string('last_name'); 
            $table->string('suffix_name')->nullable();
            $table->unsignedBigInteger('user_id')->nullable(); 

            $table->foreign('user_id')  
                  ->references('id')  
                  ->on('users')  
                  ->onDelete('cascade');

            $table->timestamps(); // created_at and updated_at timestamps
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user_name_info');
    }
};
