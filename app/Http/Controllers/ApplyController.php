<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\PromoCode;
use App\Models\Application;
use App\Mail\NewApplicationAdminMail;
use App\Mail\PromoCodeUsedInfluencerMail;
use App\Mail\ApplicationConfirmationStudentMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

class ApplyController extends Controller
{
    public function index()
    {
        $courses = Course::where('is_active', true)->get();
        return view('apply', compact('courses'));
    }

    public function validateCode(Request $request)
    {
        $request->validate([
            'code' => 'required|string',
            'course_id' => 'required|exists:courses,id',
            'location' => 'required|string',
        ]);

        $course = Course::findOrFail($request->course_id);
        $location = $request->location;
        $originalPrice = $course->getPriceForLocation($location);
        $currency = $course->getCurrencyForLocation($location);

        $codeStr = strtoupper(trim($request->code));
        $promoCode = PromoCode::where('code', $codeStr)->first();

        if (!$promoCode || !$promoCode->isValid()) {
            return response()->json([
                'valid' => false,
                'message' => 'Invalid, inactive, or expired promo code.',
            ], 422);
        }

        $discountPercent = (float) $promoCode->discount_percent;
        $discountAmount = (int) round(($originalPrice * $discountPercent) / 100);
        $finalPrice = max(0, $originalPrice - $discountAmount);

        return response()->json([
            'valid' => true,
            'code' => $promoCode->code,
            'discount_percent' => $discountPercent,
            'discount_amount' => $discountAmount,
            'original_price' => $originalPrice,
            'final_price' => $finalPrice,
            'currency' => $currency,
            'message' => "{$discountPercent}% Promo Discount Applied!",
        ]);
    }

    public function submit(Request $request)
    {
        $validated = $request->validate([
            'full_name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone_code' => 'required|string|max:10',
            'phone' => 'required|string|max:20',
            'course_id' => 'required|exists:courses,id',
            'location' => 'required|string',
            'schedule' => 'required|string',
            'experience' => 'nullable|string',
            'notes' => 'nullable|string',
            'promo_code' => 'nullable|string',
        ]);

        $course = Course::findOrFail($validated['course_id']);
        $location = $validated['location'];
        $originalPrice = $course->getPriceForLocation($location);
        $currency = $course->getCurrencyForLocation($location);

        $discountAmount = 0;
        $finalPrice = $originalPrice;
        $promoCodeObj = null;
        $influencerId = null;
        $commissionAmount = 0;

        if (!empty($validated['promo_code'])) {
            $codeStr = strtoupper(trim($validated['promo_code']));
            $promoCodeObj = PromoCode::where('code', $codeStr)->first();

            if ($promoCodeObj && $promoCodeObj->isValid()) {
                $discountPercent = (float) $promoCodeObj->discount_percent;
                $discountAmount = (int) round(($originalPrice * $discountPercent) / 100);
                $finalPrice = max(0, $originalPrice - $discountAmount);

                $influencerId = $promoCodeObj->influencer_id;
                $commissionPercent = (float) $promoCodeObj->commission_percent;
                $commissionAmount = (int) round(($finalPrice * $commissionPercent) / 100);

                // Increment usage counter
                $promoCodeObj->increment('times_used');
            }
        }

        // Generate unique reference number
        $refNo = 'DH-' . date('Y') . '-' . strtoupper(Str::random(6));

        $application = Application::create([
            'reference_no' => $refNo,
            'full_name' => $validated['full_name'],
            'email' => $validated['email'],
            'phone_code' => $validated['phone_code'],
            'phone' => $validated['phone'],
            'course_id' => $course->id,
            'location' => $location,
            'schedule' => $validated['schedule'],
            'experience' => $validated['experience'] ?? 'Beginner',
            'notes' => $validated['notes'] ?? null,
            'currency' => $currency,
            'original_price' => $originalPrice,
            'discount_amount' => $discountAmount,
            'final_price' => $finalPrice,
            'promo_code_id' => $promoCodeObj ? $promoCodeObj->id : null,
            'influencer_id' => $influencerId,
            'commission_amount' => $commissionAmount,
            'payment_status' => 'pending_verification',
            'payout_status' => 'unearned',
        ]);

        // Send Email Notifications safely
        try {
            // Admin notification
            Mail::to(config('mail.from.address', 'admissions@divahouse.com'))->send(new NewApplicationAdminMail($application));

            // Student confirmation email
            Mail::to($application->email)->send(new ApplicationConfirmationStudentMail($application));

            // Influencer email if code was used
            if ($application->influencer && $application->influencer->email) {
                Mail::to($application->influencer->email)->send(new PromoCodeUsedInfluencerMail($application));
            }
        } catch (\Exception $e) {
            // Log error silently if mail transport is not yet configured
            logger()->error('Mail sending failed for application ' . $refNo . ': ' . $e->getMessage());
        }

        return response()->json([
            'success' => true,
            'reference_no' => $application->reference_no,
            'full_name' => $application->full_name,
            'course_name' => $course->name,
            'location' => $application->location,
            'schedule' => $application->schedule,
            'currency' => $application->currency,
            'original_price' => $application->original_price,
            'discount_amount' => $application->discount_amount,
            'final_price' => $application->final_price,
        ]);
    }
}
