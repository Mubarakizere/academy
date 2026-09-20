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
        Schema::create('reviews', function (Blueprint $table) {
            $table->id();
            $table->string('student_name');
            $table->string('avatar_initials')->nullable();
            $table->string('role_title')->default('Graduate');
            $table->string('location')->default('Kigali'); // Kigali, Nairobi, Mombasa
            $table->string('course_name')->default('Lashes Artistry'); // Lashes Artistry, Pro Makeup
            $table->unsignedTinyInteger('rating')->default(5);
            $table->text('comment');
            $table->boolean('is_featured')->default(true);
            $table->boolean('is_active')->default(true);
            $table->integer('order')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reviews');
    }
};
