<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('lease_contracts', function (Blueprint $table) {

            $table->boolean('landlord_signed')
                ->default(false)
                ->after('status');

            $table->boolean('tenant_signed')
                ->default(false)
                ->after('landlord_signed');

            $table->timestamp('landlord_signed_at')
                ->nullable();

            $table->timestamp('tenant_signed_at')
                ->nullable();

        });
    }

    public function down(): void
    {
        Schema::table('lease_contracts', function (Blueprint $table) {

            $table->dropColumn([
                'landlord_signed',
                'tenant_signed',
                'landlord_signed_at',
                'tenant_signed_at'
            ]);

        });
    }
};