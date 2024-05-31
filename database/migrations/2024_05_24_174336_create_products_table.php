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
        Schema::create('product', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->integer('category_id');
            $table->integer('user_id');
            $table->string('description');
            $table->enum('stock',['in a stock','out of stock'])->default('in a stock');
            $table->float('price');
            $table->enum('weight_type',['gm','kg'])->default('kg');
            $table->string('weight')->nullable();
            $table->tinyInteger('is_approved');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('product');
    }
};
