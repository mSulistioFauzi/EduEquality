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
        Schema::create('tutoring_sessions', function (Blueprint $table) {
            $table->id();
            $table->foreignId('help_request_id')
                ->constrained('help_requests')
                ->cascadeOnDelete();

            $table->foreignId('tutor_id')
                ->constrained('users')
                ->restrictOnDelete();

            $table->dateTime('scheduled_at')->nullable();

            $table->string('mode_belajar')->default('online');
            $table->string('lokasi')->nullable();

            $table->string('status')->default('dijadwalkan');

            $table->text('session_notes')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tutoring_sessions');
    }
};
