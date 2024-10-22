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
        Schema::create('safety_translations', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('safety_id');
            $table->string('locale')->index();

            $table->string('name');

            $table->unique(['safety_id', 'locale']);
            $table->foreign('safety_id')->references('id')->on('safeties')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('safety_translations');
    }
};
