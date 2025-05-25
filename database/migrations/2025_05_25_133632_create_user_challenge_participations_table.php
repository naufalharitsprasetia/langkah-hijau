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
        Schema::create('user_challenge_participations', function (Blueprint $table) {
            $table->id();
            //FK ke table users
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
            //Fk ke table challenges
            $table->foreignId('challenge_id')->constrained('challenges')->onDelete('cascade');

            $table->date('start_date');
            $table->enum('status', ['active', 'completed', 'abondoned'])->default('active');
            $table->date('completion_date')->nullable();
            $table->integer('earned_challenge_points')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user_challenge_participations');
    }
};
