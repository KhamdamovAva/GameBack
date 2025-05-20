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
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->string('fullname');
            $table->bigInteger('phone');
            $table->foreignId('delivery_method_id')->constrained()->onDelete('cascade');
            $table->string('address');
            $table->string('comment')->nullable();
            $table->enum('status', ['new', 'procces', 'finished'])->nullable()->default('new');
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
