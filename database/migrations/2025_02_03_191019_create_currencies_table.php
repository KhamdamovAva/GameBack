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
        Schema::create('currencies', function (Blueprint $table) {
            $table->id();
            $table->string('currency');
            $table->unsignedInteger('conversions');
            $table->string('Code')->nullable();
            $table->string('Ccy')->unique()->nullable();
            $table->integer('Nominal')->unsigned()->nullable()->default(1);
            $table->decimal('Rate', 10, 2)->nullable();
            $table->decimal('Diff', 2,1)->nullable();
            $table->date('Date')->nullable()->default(now());
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('currencies');
    }
};
