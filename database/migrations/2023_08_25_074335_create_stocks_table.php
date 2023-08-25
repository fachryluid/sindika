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
        Schema::create('stocks', function (Blueprint $table) {
            $table->id();
            $table->uuid('uuid')->unique();
            $table->integer('quantity');
            $table->decimal('order_cost', $precision = 10, $scale = 2);
            $table->decimal('storage_cost', $precision = 10, $scale = 2);
            $table->datetime('order_date');
            $table->date('expected_delivery');
            $table->decimal('price', $precision = 10, $scale = 2);
            $table->date('expired_date');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('stocks');
    }
};
