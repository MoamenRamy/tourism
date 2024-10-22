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
        Schema::create('transportation_reservations', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('transportation_id')->nullable();
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('currency_id')->nullable();
            $table->string('first_name')->nullable();
            $table->string('last_name')->nullable();
            $table->text('address');
            $table->string('hotel')->nullable();
            $table->string('flight_number')->nullable();
            $table->integer('guest')->default(1);
            $table->dateTime('reservation_dateTime');
            $table->decimal('price', 8, 2);
            $table->string('phone');
            $table->string('whatsapp');
            $table->text('note')->nullable();
            $table->enum('payment_status', ['unpaid', 'deposit', 'paid'])->default('unpaid');

            $table->timestamps();

            $table->foreign('transportation_id')->references('id')->on('transportations')->onDelete('set null');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('currency_id')->references('id')->on('currencies')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transportation_reservations');
    }
};
