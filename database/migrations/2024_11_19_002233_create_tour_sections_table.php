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
        Schema::create('tour_sections', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('tour_id');
            $table->float('duration')->nullable();  // check float num like 1.5 , 2.5
            $table->enum('duration_type', ['hours', 'days'])->nullable();
            
            $table->timestamps();
            $table->foreign('tour_id')->references('id')->on('tours')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tour_sections');
    }
};
