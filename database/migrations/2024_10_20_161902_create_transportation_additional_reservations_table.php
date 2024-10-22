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
        Schema::create('transportation_additional_reservations', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('additional_id')->nullable();
            $table->unsignedBigInteger('reservation_id');
            $table->timestamps();

            $table->foreign('additional_id')->references('id')->on('transportation_additionals')->onDelete('set null');
            $table->foreign('reservation_id')->references('id')->on('transportation_reservations')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transportation_additional_reservations');
    }
};
