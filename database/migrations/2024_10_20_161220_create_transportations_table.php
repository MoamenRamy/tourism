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
        Schema::create('transportations', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('destination_id')->nullable();

            $table->decimal('price', 8, 2);
            $table->unsignedBigInteger('vehicle_id');
            $table->boolean('available')->default(0);
            $table->timestamps();

            $table->foreign('destination_id')->references('id')->on('destinations')->onDelete('set null');
            $table->foreign('vehicle_id')->references('id')->on('vehicles')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transportations');
    }
};
