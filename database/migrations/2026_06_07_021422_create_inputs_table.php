<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('inputs', function (Blueprint $table) {
            $table->id();
            $table->string('title', 255);
            $table->text('description')->nullable();
            $table->string('type', 50)->default('radio'); // e.g., 'radio', 'select', 'slider'
            
            // JSON fields mapping for options metadata
            $table->json('list_types')->nullable();
            $table->json('categories')->nullable();
            
            // Clean foreign key relation referencing the newly renamed dimensions table
            $table->foreignId('dimension_id')->constrained('dimensions')->onDelete('cascade');
            
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('inputs');
    }
};