<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('bailiff_reports', function (Blueprint $table) {

            $table->id();

            $table->foreignId('dispute_id')
                ->constrained()
                ->cascadeOnDelete();

            $table->foreignId('bailiff_id')
                ->constrained('users')
                ->cascadeOnDelete();

            $table->string('title');

            $table->longText('findings');

            $table->longText('decision')->nullable();

            $table->longText('recommendations')->nullable();

            $table->enum('status',[
                'draft',
                'submitted'
            ])->default('draft');

            $table->timestamp('submitted_at')->nullable();

            $table->timestamps();

        });
    }

    public function down(): void
    {
        Schema::dropIfExists('bailiff_reports');
    }
};