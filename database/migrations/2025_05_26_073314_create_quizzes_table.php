<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('quizzes', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->text('description')->nullable(); // Deskripsi quiz, bisa kosong
            $table->integer('duration_minutes')->nullable(); // Durasi quiz dalam menit, bisa kosong
            $table->timestamps(); // created_at dan updated_at
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('quizzes');
    }
};