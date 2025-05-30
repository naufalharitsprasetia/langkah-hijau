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
        Schema::create('challenge_daily_actions', function (Blueprint $table) {
            $table->id();
            // FK ke tabel challenge_participations
            $table->uuid('challenge_participation_id');
            $table->foreign('challenge_participation_id')->references('id')->on('challenge_participations')->onDelete('cascade');
            // DAY -> action berdasarakan durasi_day challenge, ct:day_1,day_2
            $table->string('day');
            $table->dateTime('checked_at');
            $table->boolean('is_checked')->default(false);
            $table->timestamps();
            // $table->integer('daily_points')->default(0); masuk langsung ke $user->green_points
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('challenge_daily_actions');
    }
};