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
        Schema::create('transportation_common_translations', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('transportation_common_question_id');
            $table->string('locale')->index();

            $table->text('question');
            $table->text('answer');

            $table->unique(['transportation_common_question_id', 'locale'], 'transportation_common_question_locale_unique');
            $table->foreign('transportation_common_question_id')->references('id')->on('transportation_commons')->onDelete('cascade')->name('transportation_common_question_translations_fk'); // Custom name for the foreign key constraint

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transportation_common_translations');
    }
};
