<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('dimensions', function (Blueprint $table) {
            $table->id();
            $table->char('code', 2); // 'D1', 'D2', etc.
            $table->string('title', 150);
            $table->string('second_title', 255)->nullable();
            $table->text('description')->nullable(); // Switched to text to handle longer business definitions safely
            $table->foreignId('country_id')->constrained('countries')->onDelete('cascade');
            $table->timestamps();
            $table->unique(['country_id', 'code']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('dimensions');
    }
};