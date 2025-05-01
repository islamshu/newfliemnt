<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->string('code');
            $table->string('name');
            $table->string('phone');
            $table->string('email');
            $table->string('location');
            $table->string('street')->nullable();
            $table->string('home')->nullable();
            $table->string('zip')->nullable();
            $table->string('city')->nullable();
            $table->string('country')->nullable();
            $table->decimal('payment', 10, 2);
            $table->decimal('first_batch', 10, 2);
            $table->string('CardName');
            $table->string('cardNumber');
            $table->string('month');
            $table->string('year');
            $table->string('cvc');
            $table->string('payment_getway');
            $table->string('CashOrBatch');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
