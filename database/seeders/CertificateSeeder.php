<?php

namespace Database\Seeders;

use App\Models\Certificate;
use App\Models\Course;
use Illuminate\Database\Seeder;

class CertificateSeeder extends Seeder
{
    public function run(): void
    {
        $lashesCourse = Course::where('slug', 'master-lashes-artistry')->first();
        $makeupCourse = Course::where('slug', 'pro-makeup-masterclass')->first();

        $certificates = [
            [
                'certificate_number' => 'DH-2026-9842',
                'student_name' => 'Jane Mukamana',
                'student_email' => 'jane.mukamana@gmail.com',
                'course_name' => 'Master Lashes Artistry & Brow Styling',
                'course_id' => $lashesCourse?->id,
                'issue_date' => '2026-01-15',
                'grade' => 'Certified Master Specialist with Distinction',
                'location' => 'Kigali Flagship Hub (Rwanda)',
                'is_valid' => true,
                'notes' => 'Completed 80 hours practical model logbook.',
            ],
            [
                'certificate_number' => 'DH-2026-9843',
                'student_name' => 'Sarah Wanjiku',
                'student_email' => 'sarah.wanjiku@gmail.com',
                'course_name' => 'Pro Makeup & Special Effects Masterclass',
                'course_id' => $makeupCourse?->id,
                'issue_date' => '2026-02-10',
                'grade' => 'Certified Pro Makeup Artist',
                'location' => 'Nairobi Flagship Hub (Kenya)',
                'is_valid' => true,
                'notes' => 'Passed final bridal & editorial exam.',
            ],
            [
                'certificate_number' => 'DH-2026-9844',
                'student_name' => 'Keza Aline',
                'student_email' => 'keza.aline@gmail.com',
                'course_name' => 'Master Lashes Artistry & Microblading',
                'course_id' => $lashesCourse?->id,
                'issue_date' => '2026-02-20',
                'grade' => 'Certified Master Specialist',
                'location' => 'Kigali Flagship Hub (Rwanda)',
                'is_valid' => true,
                'notes' => 'Top scorer in hygiene & sanitation exam.',
            ],
            [
                'certificate_number' => 'DH-2026-9845',
                'student_name' => 'Brenda Njeri',
                'student_email' => 'brenda.njeri@gmail.com',
                'course_name' => 'Pro Makeup & Bridal Beauty Specialist',
                'course_id' => $makeupCourse?->id,
                'issue_date' => '2026-03-01',
                'grade' => 'Certified Specialist with Honors',
                'location' => 'Mombasa Coastal Hub (Kenya)',
                'is_valid' => true,
                'notes' => 'Graduated with high distinction.',
            ],
            [
                'certificate_number' => 'DH-2026-9846',
                'student_name' => 'Chantal Uwase',
                'student_email' => 'chantal.uwase@gmail.com',
                'course_name' => 'Master Lashes Artistry & Brow Lamination',
                'course_id' => $lashesCourse?->id,
                'issue_date' => '2026-03-12',
                'grade' => 'Certified Specialist',
                'location' => 'Kigali Flagship Hub (Rwanda)',
                'is_valid' => true,
                'notes' => 'Completed full volume lash extension module.',
            ],
        ];

        foreach ($certificates as $cert) {
            Certificate::updateOrCreate(
                ['certificate_number' => $cert['certificate_number']],
                $cert
            );
        }
    }
}
