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
        Schema::create('tours', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('destination_id')->nullable();
            $table->unsignedBigInteger('category_id')->nullable();

            $table->decimal('price', 8, 2);
            $table->float('duration')->nullable();
            $table->enum('duration_type', ['hours', 'days'])->nullable();
            $table->decimal('rating', 3, 2);
            $table->boolean('available')->default(0); // 1 => available
            $table->text('additional_info')->nullable();
            $table->integer('max_tickets_per_day')->nullable();
            $table->double('longitude')->nullable();
            $table->double('latitude')->nullable();
            $table->integer('count')->default(0); // reservation count
            $table->boolean('pin')->default(0);

            $table->timestamps();

            $table->foreign('destination_id')->references('id')->on('destinations')->onDelete('set null');
            $table->foreign('category_id')->references('id')->on('categories')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tours');
    }
};
