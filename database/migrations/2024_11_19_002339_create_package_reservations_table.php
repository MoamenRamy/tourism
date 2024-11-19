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
        Schema::create('package_reservations', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('package_id')->nullable();
            $table->unsignedBigInteger('user_id');
            $table->string('first_name');
            $table->string('last_name');
            $table->text('address');
            $table->integer('guest')->default(1);
            $table->date('reservation_date');
            $table->decimal('price', 8, 2);
            $table->string('phone');
            $table->string('whatsapp');
            $table->unsignedBigInteger('currency_id')->nullable();
            $table->text('note')->nullable();
            $table->enum('payment_status', ['unpaid', 'deposit', 'paid'])->default('unpaid');

            $table->timestamps();
            $table->foreign('package_id')->references('id')->on('packages')->onDelete('set null');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('currency_id')->references('id')->on('currencies')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('package_reservations');
    }
};
