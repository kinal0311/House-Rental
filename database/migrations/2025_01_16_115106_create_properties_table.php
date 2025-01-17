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
        Schema::create('properties', function (Blueprint $table) {
            $table->id();
            $table->string('property_type', 255);
            $table->enum('status', ['Sale', 'Sold', 'Rent']);
            $table->decimal('price', 10, 2);
            $table->integer('max_rooms')->nullable();
            $table->integer('beds')->nullable();
            $table->integer('baths')->nullable();
            $table->string('area', 255)->nullable();
            $table->text('description')->nullable();
            $table->string('address', 255);
            $table->string('zip_code', 20);
            $table->string('city', 255);
            $table->text('media')->nullable();
            $table->text('additional_features')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('properties');
    }
};
