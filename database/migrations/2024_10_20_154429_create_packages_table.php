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
        Schema::create('packages', function (Blueprint $table) {
            $table->id();
            $table->string('slug')->unique();
            $table->string('title')->unique();

            $table->decimal('price', 8, 2)->nullable();
            $table->float('duration')->nullable();
            $table->enum('duration_type', ['hours', 'days'])->default('days'); // Default value for duration_type
            $table->boolean('available')->default(0);
            $table->boolean('pin')->default(0);

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('packages');
    }
};
