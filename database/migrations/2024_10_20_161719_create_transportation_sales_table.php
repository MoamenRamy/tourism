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
        Schema::create('transportation_sales', function (Blueprint $table) {
            $table->id();
            // sale on all transportation that have destination id => ...
            $table->unsignedBigInteger('destination_id');
            $table->decimal('discount_percentage')->nullable();
            $table->decimal('discount_amount')->nullable();
            $table->date('discount_start_date')->nullable();
            $table->date('discount_end_date')->nullable();
            $table->boolean('active')->default(0);
            $table->timestamps();

            $table->foreign('destination_id')->references('id')->on('destinations')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transportation_sales');
    }
};
