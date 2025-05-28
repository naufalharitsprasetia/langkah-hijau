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
        Schema::create('events', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('title');
            $table->string('category');
            $table->string('image')->nullable();
            $table->text('description');
            $table->string('location');
            $table->string('penyelenggara'); // langkahhijau event
            $table->string('contact_person');
            $table->string('contact_person_number');
            $table->dateTime('date_time');
            $table->boolean('is_demo')->default(false);
            // FOREIGN KEY -> users.id (INTEGER)
            $table->unsignedBigInteger('user_id')->nullable();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('events');
    }
};