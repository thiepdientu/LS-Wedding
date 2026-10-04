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
        Schema::table('wedding_cards', function (Blueprint $table) {
            $table->string('status')->default('active')->after('template')->index();
            $table->string('customer_email')->nullable()->after('groom_phone');
            $table->timestamp('expires_at')->nullable()->after('wedding_date');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('wedding_cards', function (Blueprint $table) {
            $table->dropIndex(['status']);
            $table->dropColumn(['status', 'customer_email', 'expires_at']);
        });
    }
};
