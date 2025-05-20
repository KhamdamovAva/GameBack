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
        Schema::create('banner_translations', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('banner_id');
            $table->string('locale')->index();
            $table->string('name');
            $table->string('description');

            $table->unique(['banner_id','locale']);
            $table->foreign('banner_id')->references('id')->on('banners')->onDelete('cascade');
            $table->timestamps();
        });
    }
    public function down(): void
    {
        Schema::dropIfExists('banner_translations');
    }
};
