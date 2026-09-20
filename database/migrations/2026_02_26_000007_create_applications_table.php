<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('applications', function (Blueprint $table) {
            $table->id();
            $table->string('reference_no')->unique();
            $table->string('full_name');
            $table->string('email');
            $table->string('phone_code')->default('+250');
            $table->string('phone');
            $table->foreignId('course_id')->nullable()->constrained('courses')->onDelete('set null');
            $table->string('location'); // Kigali, Nairobi, Mombasa
            $table->string('schedule'); // fulltime, evening, weekend
            $table->string('experience')->default('Beginner');
            $table->text('notes')->nullable();

            // Financials in native currency
            $table->string('currency', 10)->default('RWF'); // RWF, KES, USD
            $table->unsignedBigInteger('original_price')->default(0);
            $table->unsignedBigInteger('discount_amount')->default(0);
            $table->unsignedBigInteger('final_price')->default(0);

            // Promo Code & Influencer Attribution
            $table->foreignId('promo_code_id')->nullable()->constrained('promo_codes')->onDelete('set null');
            $table->foreignId('influencer_id')->nullable()->constrained('users')->onDelete('set null');
            $table->unsignedBigInteger('commission_amount')->default(0);

            // Two-Tier Verification & Payout Status
            $table->string('payment_status')->default('pending_verification'); // pending_verification, verified_paid, cancelled
            $table->timestamp('verified_at')->nullable();
            $table->foreignId('verified_by')->nullable()->constrained('users')->onDelete('set null');

            $table->string('payout_status')->default('unearned'); // unearned, confirmed, transferred
            $table->timestamp('payout_transferred_at')->nullable();
            $table->string('payout_reference')->nullable();

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('applications');
    }
};
