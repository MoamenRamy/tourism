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
        Schema::create('transportation_vehicle', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('transportation_id');
            $table->unsignedBigInteger('vehicle_id');
            $table->decimal('price', 8, 2);
            
            $table->foreign('transportation_id')->references('id')->on('transportations')->onDelete('cascade');
            $table->foreign('vehicle_id')->references('id')->on('vehicles')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transportation_vehicle');
    }
};
