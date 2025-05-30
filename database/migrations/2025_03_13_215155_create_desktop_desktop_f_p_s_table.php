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
        Schema::create('desktop_desktop_f_p_s', function (Blueprint $table) {
            $table->id();
            $table->foreignId('desktop_id')->constrained()->onDelete('cascade');
            $table->foreignId('desktop_f_p_s_id')->constrained()->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('desktop_desktop_f_p_s');
    }
};
