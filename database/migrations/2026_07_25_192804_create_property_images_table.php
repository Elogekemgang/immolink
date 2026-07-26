<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('property_images', function (Blueprint $table) {

            $table->id();

            $table->foreignId('property_id')
                ->constrained()
                ->cascadeOnDelete();

            // Chemin de l'image
            $table->string('image');

            // Photo principale ?
            $table->boolean('is_primary')
                ->default(false);

            // Ordre d'affichage
            $table->unsignedInteger('position')
                ->default(1);

            $table->timestamps();

        });
    }

    public function down(): void
    {
        Schema::dropIfExists('property_images');
    }
};