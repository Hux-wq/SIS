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
        Schema::create('courses', function (Blueprint $table) {
            $table->id();
            $table->string('code');  
            $table->string('name');  
            $table->string('programs');  
            $table->string('department');  
            $table->string('created_by');  
            $table->unsignedBigInteger('program_id');  

            $table->foreign('program_id')  
                  ->references('id')  
                  ->on('programs')  
                  ->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('courses');
    }
};
