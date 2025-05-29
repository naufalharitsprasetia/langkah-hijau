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
        Schema::create('daily_user_actions', function (Blueprint $table) {
            $table->id();
            //FK ke tabel user_challenge_participations
            $table->foreignId('participation_id')->constrained('user_challenge_participations')->onDelete('cascade');

            $table->date('action_date');
            $table->integer('daily_points')->default(0);
            $table->text('checklist_status')->nullable();
            $table->string('photo_submission_path')->nullable();
            $table->text('notes')->nullable();
            $table->boolean('is_completed')->default(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('daily_user_actions');
    }
};