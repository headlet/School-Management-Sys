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
        Schema::create('students', function (Blueprint $table) {
            $table->id();
            $table->string('full_name');
            $table->string('registration');
            $table->string('phone_number', 10);
            $table->string('photo');
            $table->date('dob');
            $table->string('password');
            $table->string('email')->unique();
            $table->date('doa');
            $table->enum('gender', ['male', 'female', 'other'])->default('male');
            $table->string('class');
            $table->string('address');
            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('students');
    }
};
