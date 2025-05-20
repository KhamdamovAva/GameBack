<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('order_items', function (Blueprint $table) {
            $table->id();
            $table->foreignId('order_id')->constrained()->onDelete('cascade');
            $table->string('item_type');
            $table->unsignedBigInteger('item_id');
            $table->string('name');
            $table->integer('quantity');
            $table->decimal('price');
            $table->timestamps();
        });
    }
    public function down(): void
    {
        Schema::dropIfExists('order_items');
    }
};
