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
    Schema::create('disputes', function (Blueprint $table) {

        $table->id();

        $table->foreignId('lease_contract_id')
            ->constrained()
            ->cascadeOnDelete();

        $table->foreignId('opened_by')
            ->constrained('users');

        $table->foreignId('bailiff_id')
            ->nullable()
            ->constrained('users');

        $table->string('title');

        $table->text('description');

        $table->enum('status',[
            'open',
            'assigned',
            'investigating',
            'resolved',
            'closed'
        ])->default('open');

        $table->timestamps();
        $table->enum('bailiff_status',[
            'pending',
            'accepted',
            'declined'
        ])->default('pending');

        $table->timestamp('accepted_at')->nullable();

    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('disputes');
    }
};
