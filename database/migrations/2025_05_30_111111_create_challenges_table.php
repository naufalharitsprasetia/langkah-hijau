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
        Schema::create('challenges', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('title');
            $table->text('description');
            $table->string('image')->nullable();
            $table->integer('duration_days');
            $table->integer('green_points');
            // FOREIGN KEY -> badges.id (INTEGER)
            $table->unsignedBigInteger('badge_id'); // required
            $table->foreign('badge_id')->references('id')->on('badges')->onDelete('cascade');
            $table->timestamps();
            // $table->text('checklist')->nullable(); ubah ke Tabel challenge_actions
            // $table->integer('completion_bonus_points')->default(0); ke $user->green_points
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('challenges');
    }
};