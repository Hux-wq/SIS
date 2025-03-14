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
        Schema::create('grades', function (Blueprint $table) {
            $table->id();
            $table->string('type');
            $table->string('test_no');
            $table->UnsignedBigInteger('score')->default(0);
            $table->UnsignedBigInteger('total')->default(50);
            $table->UnsignedBigInteger('student_id');
            $table->UnsignedBigInteger('course_id');
            $table->UnsignedBigInteger('section_id');
            

            $table->foreign('student_id') 
            ->references('id')  
            ->on('users')  
            ->onDelete('cascade');

            $table->foreign('course_id') 
            ->references('id')  
            ->on('courses')  
            ->onDelete('cascade');

            $table->foreign('section_id') 
            ->references('id')  
            ->on('sections')  
            ->onDelete('cascade');


            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('grade');
    }
};
