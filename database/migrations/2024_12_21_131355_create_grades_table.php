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
        Schema::create('grades', function (Blueprint $table) {
            $table->id();
            $table->foreignId('student_id')->constrained('users')->onDelete('cascade'); // Powiązanie z tabelą users (uczniowie)
            $table->foreignId('teacher_id')->constrained('users')->onDelete('cascade'); // Powiązanie z tabelą users (nauczyciele)
            $table->integer('grade')->comment('Ocena, np. 1-6');
            $table->text('comment')->nullable()->comment('Komentarz do oceny');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('grades');
    }
};
