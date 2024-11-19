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
        Schema::create('tour_section_translations', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('tour_section_id');
            $table->string('locale')->index();

            $table->text('address');
            $table->text('description');

            $table->unique(['tour_section_id', 'locale']);
            $table->foreign('tour_section_id')->references('id')->on('tour_sections')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tour_section_translations');
    }
};
