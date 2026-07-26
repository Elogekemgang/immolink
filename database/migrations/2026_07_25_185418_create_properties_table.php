<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('properties', function (Blueprint $table) {

            $table->id();

            $table->foreignId('user_id')->constrained()->onDelete('cascade');

            $table->string('title');

            $table->text('description');

            $table->enum('type', [
                'house',
                'apartment',
                'studio',
                'land',
                'office'
            ]);

            $table->decimal('price', 12, 2);

            $table->decimal('deposit', 12, 2)->default(0);

            $table->integer('bedrooms')->default(0);

            $table->integer('living_rooms')->default(0);

            $table->integer('bathrooms')->default(0);

            $table->integer('kitchens')->default(0);

            $table->boolean('parking')->default(false);

            $table->decimal('surface',8,2)->nullable();

            $table->string('city');

            $table->string('district');

$table->text('address');
            $table->decimal('latitude',10,7)->nullable();

            $table->decimal('longitude',10,7)->nullable();

            $table->enum('status',[
                'available',
                'rented',
                'pending'
            ])->default('available');

            $table->timestamps();
            $table->boolean('is_published')->default(true);
            $table->string('slug')->unique();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('properties');
    }
};