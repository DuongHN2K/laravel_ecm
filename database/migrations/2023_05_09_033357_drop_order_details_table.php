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
        Schema::dropIfExists('order_details');
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::create('order_details', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
            $table->date('order_date');
            $table->foreignId('payment_method')->constrained('payment_methods')->onDelete('cascade');
            $table->foreignId('shipping_method')->constrained('shipping_methods')->onDelete('cascade');
            $table->foreignId('shipping_address')->constrained('addresses')->onDelete('cascade');
            $table->decimal('order_total');
            $table->string('order_status');
            $table->timestamps();
        });
    }
};
