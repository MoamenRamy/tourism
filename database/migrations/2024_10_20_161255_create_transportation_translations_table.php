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
        Schema::create('transportation_translations', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('transportation_id');
            $table->string('locale')->index();

            $table->string('from');
            $table->string('to');

            $table->unique(['transportation_id', 'locale']);
            $table->foreign('transportation_id')->references('id')->on('transportations')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transportation_translations');
    }
};
