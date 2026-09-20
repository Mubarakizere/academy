<?php

namespace App\Livewire\Admin;

use App\Models\Announcement;
use App\Models\Application;
use App\Models\Classroom;
use App\Models\Course;
use App\Models\PromoCode;
use App\Models\Student;
use App\Models\Subject;
use App\Models\Teacher;
use App\Models\User;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class Dashboard extends Component
{
    public string $timeframe = '30_days';

    public function render()
    {
        // 1. Applications & Revenue Aggregation
        $totalApplications = Application::count();
        $pendingApplications = Application::where('payment_status', 'pending')->orWhereNull('payment_status')->count();
        $paidApplications = Application::where('payment_status', 'paid')->count();
        $totalRevenue = Application::sum('final_price');
        $totalCommissionPaid = Application::sum('commission_amount');

        // 2. Academic Metrics
        $totalTeachers = Teacher::count();
        $totalStudents = Student::count();
        $totalClassrooms = Classroom::count();
        $totalSubjects = Subject::count();
        $totalCourses = Course::count();
        $activePromoCodes = PromoCode::where('is_active', true)->count();

        // 3. Recent Applications Feed
        $recentApplications = Application::with(['course', 'promoCode', 'influencer'])
            ->latest()
            ->take(6)
            ->get();

        // 4. Top Performing Promo Codes
        $topPromoCodes = PromoCode::withCount('applications')
            ->orderBy('applications_count', 'desc')
            ->take(4)
            ->get();

        // 5. Recent System Announcements
        $recentAnnouncements = Announcement::latest()
            ->take(4)
            ->get();

        // 6. Real Monthly Applications Chart Calculation (Last 6 Months)
        $chartMonths = [];
        $chartValues = [];
        for ($i = 5; $i >= 0; $i--) {
            $date = Carbon::now()->subMonths($i);
            $monthName = $date->format('M Y');
            $count = Application::whereYear('created_at', $date->year)
                ->whereMonth('created_at', $date->month)
                ->count();
            
            $chartMonths[] = $monthName;
            $chartValues[] = $count;
        }

        // Max value for SVG scaling
        $maxChartVal = max(max($chartValues), 1);

        return view('livewire.admin.dashboard', [
            'totalApplications' => $totalApplications,
            'pendingApplications' => $pendingApplications,
            'paidApplications' => $paidApplications,
            'totalRevenue' => $totalRevenue,
            'totalCommissionPaid' => $totalCommissionPaid,
            'totalTeachers' => $totalTeachers,
            'totalStudents' => $totalStudents,
            'totalClassrooms' => $totalClassrooms,
            'totalSubjects' => $totalSubjects,
            'totalCourses' => $totalCourses,
            'activePromoCodes' => $activePromoCodes,
            'recentApplications' => $recentApplications,
            'topPromoCodes' => $topPromoCodes,
            'recentAnnouncements' => $recentAnnouncements,
            'chartMonths' => $chartMonths,
            'chartValues' => $chartValues,
            'maxChartVal' => $maxChartVal,
        ])->layout('layouts.admin', ['header' => 'Admissions & Academy Executive Overview']);
    }
}
