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
        Schema::create('status_translations', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('status_id');
            $table->string('locale')->index();
            $table->string('name');

            $table->unique(['status_id', 'locale']);
            $table->foreign('status_id')->references('id')->on('statuses')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('status_translations');
    }
};
