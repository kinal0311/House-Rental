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
        Schema::create('agents', function (Blueprint $table) {
            $table->id();
            $table->string('first_name', 255);
            $table->string('last_name', 255);
            $table->enum('gender', ['Male', 'Female', 'Other']);
            $table->string('phone_number', 20)->nullable();
            $table->date('dob')->nullable();
            $table->string('email', 255)->unique();
            $table->string('password', 255);
            $table->string('confirm_password', 255);
            $table->text('description')->nullable();
            $table->string('address', 255)->nullable();
            $table->string('zip_code', 20)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('agents');
    }
};
