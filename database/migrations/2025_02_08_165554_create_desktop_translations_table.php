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
        Schema::create('desktop_translations', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('desktop_id');
            $table->string('locale')->index();
            $table->string('name');
            $table->string('description');

            $table->unique(['desktop_id', 'locale']);
            $table->foreign('desktop_id')->references('id')->on('desktops')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('desktop_translations');
    }
};
