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
        Schema::create('invoices', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id');
            $table->integer('address_id');
            $table->float('total_price');
            $table->string('payment_method');
            $table->enum('payment_status',['pending','paid','unpaid'])->default('pending');
            $table->enum('delivery_method',['COD','ONLINE']);
            $table->enum('delivery_status',['PLACED','SHIPPED','DELIVERED']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('invoices');
    }
};
