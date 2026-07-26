<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('lease_contracts', function (Blueprint $table) {

            $table->id();

            $table->foreignId('property_id')
                ->constrained()
                ->cascadeOnDelete();

            $table->foreignId('landlord_id')
                ->constrained('users')
                ->cascadeOnDelete();

            $table->foreignId('tenant_id')
                ->constrained('users')
                ->cascadeOnDelete();

            $table->foreignId('rental_request_id')
                ->constrained()
                ->cascadeOnDelete();

            $table->date('start_date');

            $table->date('end_date')->nullable();

            $table->decimal('monthly_rent',12,2);

            $table->decimal('deposit',12,2);

            $table->enum('status',[
                'pending_signature',
                'active',
                'terminated',
                'cancelled'
            ])->default('pending_signature');

            $table->timestamps();

        });
    }

    public function down(): void
    {
        Schema::dropIfExists('lease_contracts');
    }
};