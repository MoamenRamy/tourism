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
        Schema::create('common_question_translations', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('common_question_id');
            $table->string('locale')->index();

            $table->text('question');
            $table->text('answer');

            $table->unique(['common_question_id', 'locale'], 'common_question_locale_unique');
            $table->foreign('common_question_id')->references('id')->on('common_questions')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('common_question_translations');
    }
};
