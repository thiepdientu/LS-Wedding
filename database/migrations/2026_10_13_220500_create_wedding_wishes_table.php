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
        Schema::create('wedding_wishes', function (Blueprint $table) {
            $table->id();
            $table->foreignId('wedding_card_id')->constrained('wedding_cards')->cascadeOnDelete();
            $table->string('sender_name', 100);
            $table->text('message');
            $table->string('attendance_status', 30)->default('unsure'); // attending, not_attending, unsure
            $table->unsignedTinyInteger('guest_count')->default(1);
            $table->boolean('is_approved')->default(true);
            $table->string('ip_address', 45)->nullable();
            $table->timestamps();

            // Indexes for fast querying
            $table->index(['wedding_card_id', 'is_approved']);
            $table->index('created_at');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('wedding_wishes');
    }
};
