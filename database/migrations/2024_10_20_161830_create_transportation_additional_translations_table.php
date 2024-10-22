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
        Schema::create('transportation_additional_translations', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('additional_id');
            $table->string('locale')->index();

            $table->string('name');
            $table->text('description');

            $table->unique(['additional_id', 'locale'], 'trans_additional_id_locale_unique');
            $table->foreign('additional_id')->references('id')->on('transportation_additionals')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transportation_additional_translations');
    }
};
