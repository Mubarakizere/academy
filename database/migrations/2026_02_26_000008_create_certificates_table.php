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
        Schema::create('certificates', function (Blueprint $table) {
            $table->id();
            $table->string('certificate_number')->unique()->index();
            $table->string('student_name');
            $table->string('student_email')->nullable();
            $table->string('course_name');
            $table->foreignId('course_id')->nullable()->constrained('courses')->nullOnDelete();
            $table->date('issue_date');
            $table->string('grade')->default('Certified Specialist');
            $table->string('location')->default('Kigali Hub');
            $table->boolean('is_valid')->default(true);
            $table->text('notes')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('certificates');
    }
};
