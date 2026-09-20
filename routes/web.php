<?php

use Illuminate\Support\Facades\Route;

use App\Models\Carousel;
use App\Models\Stat;
use App\Models\Review;
use App\Http\Controllers\ApplyController;
use App\Http\Controllers\InfluencerDashboardController;
use App\Livewire\Admin\ApplicationIndex;
use App\Livewire\Admin\PromoCodeIndex;
use App\Livewire\Admin\ReviewIndex;

Route::get('/', function () {
    $carousels = Carousel::where('is_active', true)->orderBy('order')->get();
    $stats = Stat::where('is_active', true)->orderBy('order')->get();
    $reviews = Review::where('is_active', true)->orderBy('order')->get();
    return view('welcome', compact('carousels', 'stats', 'reviews'));
})->name('home');

Route::view('/courses', 'courses')->name('courses');
Route::view('/campuses', 'campuses')->name('campuses');
Route::view('/certifications', 'certifications')->name('certifications');
Route::view('/search-certificate', 'search-certificate')->name('search.certificate');
Route::get('/verify', function () {
    return redirect()->route('search.certificate');
})->name('verify');

// Application Routes
Route::get('/apply', [ApplyController::class, 'index'])->name('apply');
Route::post('/apply/validate-code', [ApplyController::class, 'validateCode'])->name('apply.validate-code');
Route::post('/apply/submit', [ApplyController::class, 'submit'])->name('apply.submit');

// Authenticated Routes
Route::middleware(['auth'])->group(function () {
    Route::get('dashboard', function () {
        $user = auth()->user();

        if ($user && method_exists($user, 'hasRole') && $user->hasRole('admin')) {
            return redirect()->route('admin.applications');
        }

        if ($user && ($user->influencerProfile || $user->promoCodes()->exists())) {
            return redirect()->route('influencer.dashboard');
        }

        if ($user && method_exists($user, 'hasRole') && $user->hasRole('teacher')) {
            return redirect()->route('teacher.dashboard');
        }

        if ($user && method_exists($user, 'hasRole') && $user->hasRole('student')) {
            return redirect()->route('student.dashboard');
        }

        return redirect()->route('admin.applications');
    })->name('dashboard');
    Route::view('profile', 'profile')->name('profile');

    // Influencer Dashboard
    Route::get('/influencer/dashboard', [InfluencerDashboardController::class, 'index'])->name('influencer.dashboard');
    Route::post('/influencer/payout-profile', [InfluencerDashboardController::class, 'updatePayoutProfile'])->name('influencer.payout-profile');

    // Admin Management Routes
    Route::get('/admin/dashboard', \App\Livewire\Admin\Dashboard::class)->name('admin.dashboard');
    Route::get('/admin/applications', ApplicationIndex::class)->name('admin.applications');
    Route::get('/admin/promo-codes', PromoCodeIndex::class)->name('admin.promo-codes');
    Route::get('/admin/reviews', ReviewIndex::class)->name('admin.reviews');
    Route::get('/admin/certificates', \App\Livewire\Admin\CertificateIndex::class)->name('admin.certificates');
});

require __DIR__.'/auth.php';
