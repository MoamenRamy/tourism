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
        Schema::create('transportation_include_translations', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('include_id');
            $table->string('locale')->index();

            $table->string('name');

            $table->unique(['include_id', 'locale']);
            $table->foreign('include_id')->references('id')->on('transportation_includes')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transportation_include_translations');
    }
};
