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
        Schema::create('user_basic_infos', function (Blueprint $table) {
            $table->id(); 
            $table->unsignedInteger('age'); 
            $table->enum('sex', ['male', 'female']); 
            $table->date('birthdate'); 
            $table->string('religion'); 
            $table->string('place_of_birth'); 
            $table->string('current_address');
            $table->unsignedBigInteger('user_id')->nullable(); 

            $table->foreign('user_id')  
            ->references('id')  
            ->on('users')  
            ->onDelete('cascade');
            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user_basic_info');
    }
};
