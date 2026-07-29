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
        Schema::create('conversations', function (Blueprint $table) {
            $table->id();
            
            // Ajoute ces 3 colonnes
            $table->foreignId('property_id')
                  ->constrained()
                  ->cascadeOnDelete();
                  
            $table->foreignId('landlord_id')
                  ->constrained('users')
                  ->cascadeOnDelete();
                  
            $table->foreignId('tenant_id')
                  ->constrained('users')
                  ->cascadeOnDelete();
            
            $table->timestamps();
            
            // Ajoute des index pour les performances
            $table->index(['property_id', 'tenant_id', 'landlord_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('conversations');
    }
};