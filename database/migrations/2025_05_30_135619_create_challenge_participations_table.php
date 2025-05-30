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
        Schema::create('challenge_participations', function (Blueprint $table) {
            $table->uuid('id')->primary();
            // FK ke table users
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
            // FK Challenges
            $table->uuid('challenge_id');
            $table->foreign('challenge_id')->references('id')->on('challenges')->onDelete('cascade');
            $table->dateTime('start_date');
            $table->boolean('is_completed')->default(false);
            $table->dateTime('completion_date')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('challenge_participations');
    }
};