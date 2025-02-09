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
        Schema::create('additional_service_translations', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('additional_service_id');
            $table->string('locale')->index();

            $table->string('name');
            $table->text('description')->nullable();

            // Shorten the index name to avoid the 64 character limit
            $table->unique(['additional_service_id', 'locale'], 'additional_service_locale_unique');
            $table->foreign('additional_service_id')
                ->references('id')->on('additional_services')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('additional_service_translations');
    }
};
