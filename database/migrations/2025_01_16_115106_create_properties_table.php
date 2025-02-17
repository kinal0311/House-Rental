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

            $table->unsignedBigInteger('agent_id');
            // Foreign key for agent_id
            $table->foreign('agent_id')->references('id')->on('users')->onDelete('cascade');

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
            $table->tinyInteger('payment_type')->default(1);
            $table->decimal('token_amount', 10, 2)->nullable();
            $table->text('additional_features')->nullable();
            $table->unsignedTinyInteger('property_status')->default(0);
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('properties', function (Blueprint $table) {
            // Drop foreign keys
            $table->dropForeign(['image_id']);
            $table->dropForeign(['agent_id']);
        });

        Schema::dropIfExists('properties');
    }
};
