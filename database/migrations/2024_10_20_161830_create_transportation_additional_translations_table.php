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
            $table->unsignedBigInteger('transportation_additional_service_id');
            $table->string('locale')->index();

            $table->string('name');
            $table->text('description');

            // Define unique constraint with a shorter name
            $table->unique(['transportation_additional_service_id', 'locale'], 'transportation_additional_service_id_locale_unique');

            // Define foreign key constraint with a shorter name
            $table->foreign('transportation_additional_service_id', 'transportation_additional_service_id_fk')->references('id')->on('transportation_additionals')->onDelete('cascade')->name('transportation_additional_service_fk'); // Custom name for the foreign key constraint;
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
