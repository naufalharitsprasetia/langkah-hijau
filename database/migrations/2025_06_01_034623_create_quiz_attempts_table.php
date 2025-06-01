<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('quiz_attempts', function (Blueprint $table) {
            $table->id(); // Primary key

            // Foreign key untuk user yang mengerjakan quiz
            $table->foreignId('user_id')
                ->constrained() // Membuat foreign key ke tabel 'users'
                ->onDelete('cascade'); // Jika user dihapus, attempts-nya ikut terhapus

            // Foreign key untuk quiz yang dikerjakan
            $table->foreignUuid('quiz_id')
                ->constrained() // Membuat foreign key ke tabel 'quizzes'
                ->onDelete('cascade'); // Jika quiz dihapus, attempts-nya ikut terhapus
            $table->text('rekomendasi_ai')->nullable();
            // Kolom untuk menyimpan skor total quiz
            $table->integer('score');

            // Kolom timestamps (created_at dan updated_at)
            // created_at akan digunakan untuk melacak kapan quiz dikerjakan (untuk batasan harian)
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('quiz_attempts');
    }
};