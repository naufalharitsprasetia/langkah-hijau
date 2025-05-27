<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('user_answers', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade'); // Foreign key ke tabel users
            $table->foreignId('quiz_id')->constrained()->onDelete('cascade'); // Foreign key ke tabel quizzes
            $table->foreignId('question_id')->constrained()->onDelete('cascade'); // Foreign key ke tabel questions
            $table->foreignId('selected_option_id')->nullable()->constrained('options')->onDelete('cascade'); // Foreign key ke tabel options (bisa null jika jawaban bentuk teks)
            $table->text('answer_text')->nullable(); // Untuk jawaban esai atau isian singkat
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('user_answers');
    }
};
