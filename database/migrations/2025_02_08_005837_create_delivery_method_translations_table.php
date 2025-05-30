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
        Schema::create('delivery_method_translations', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('delivery_method_id');
            $table->string('locale')->index();
            $table->string('name');
            $table->unique(['delivery_method_id', 'locale']);
            $table->foreign('delivery_method_id')->references('id')->on('delivery_methods')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('delivery_method_translations');
    }
};
