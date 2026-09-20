<?php

namespace App\Livewire\Admin;

use App\Models\Certificate;
use App\Models\Course;
use Livewire\Component;
use Livewire\WithPagination;

class CertificateIndex extends Component
{
    use WithPagination;

    public string $search = '';
    public bool $showForm = false;
    public bool $showDeleteModal = false;
    public ?int $editingId = null;
    public ?int $deletingId = null;

    public string $certificate_number = '';
    public string $student_name = '';
    public string $student_email = '';
    public string $course_name = '';
    public ?int $course_id = null;
    public string $issue_date = '';
    public string $grade = 'Certified Specialist';
    public string $location = 'Kigali Flagship Hub (Rwanda)';
    public bool $is_valid = true;
    public string $notes = '';

    protected function rules(): array
    {
        return [
            'certificate_number' => 'required|string|max:100|unique:certificates,certificate_number,' . $this->editingId,
            'student_name' => 'required|string|max:255',
            'student_email' => 'nullable|email|max:255',
            'course_name' => 'required|string|max:255',
            'course_id' => 'nullable|exists:courses,id',
            'issue_date' => 'required|date',
            'grade' => 'required|string|max:255',
            'location' => 'required|string|max:255',
            'is_valid' => 'boolean',
            'notes' => 'nullable|string|max:1000',
        ];
    }

    public function generateCode(): void
    {
        $year = date('Y');
        $random = str_pad(mt_rand(1000, 9999), 4, '0', STR_PAD_LEFT);
        $this->certificate_number = 'DH-' . $year . '-' . $random;
    }

    public function create(): void
    {
        $this->reset(['student_name', 'student_email', 'course_name', 'course_id', 'editingId', 'notes']);
        $this->generateCode();
        $this->issue_date = date('Y-m-d');
        $this->grade = 'Certified Specialist';
        $this->location = 'Kigali Flagship Hub (Rwanda)';
        $this->is_valid = true;
        $this->showForm = true;
    }

    public function edit(int $id): void
    {
        $cert = Certificate::findOrFail($id);
        $this->editingId = $id;
        $this->certificate_number = $cert->certificate_number;
        $this->student_name = $cert->student_name;
        $this->student_email = $cert->student_email ?? '';
        $this->course_name = $cert->course_name;
        $this->course_id = $cert->course_id;
        $this->issue_date = $cert->issue_date ? $cert->issue_date->format('Y-m-d') : date('Y-m-d');
        $this->grade = $cert->grade;
        $this->location = $cert->location;
        $this->is_valid = $cert->is_valid;
        $this->notes = $cert->notes ?? '';
        $this->showForm = true;
    }

    public function updatedCourseId($val): void
    {
        if ($val) {
            $course = Course::find($val);
            if ($course) {
                $this->course_name = $course->title;
            }
        }
    }

    public function save(): void
    {
        $this->validate();

        $data = [
            'certificate_number' => strtoupper(trim($this->certificate_number)),
            'student_name' => trim($this->student_name),
            'student_email' => trim($this->student_email),
            'course_name' => trim($this->course_name),
            'course_id' => $this->course_id,
            'issue_date' => $this->issue_date,
            'grade' => trim($this->grade),
            'location' => trim($this->location),
            'is_valid' => $this->is_valid,
            'notes' => trim($this->notes),
        ];

        if ($this->editingId) {
            Certificate::findOrFail($this->editingId)->update($data);
            session()->flash('success', 'Graduate certificate record updated successfully.');
        } else {
            Certificate::create($data);
            session()->flash('success', 'New graduate certificate issued successfully.');
        }

        $this->showForm = false;
    }

    public function toggleValid(int $id): void
    {
        $cert = Certificate::findOrFail($id);
        $cert->update(['is_valid' => !$cert->is_valid]);
        session()->flash('success', 'Certificate status updated.');
    }

    public ?Certificate $deletingCertificate = null;

    public function confirmDelete(int $id): void
    {
        $this->deletingId = $id;
        $this->deletingCertificate = Certificate::find($id);
        $this->showDeleteModal = true;
    }

    public function cancelDelete(): void
    {
        $this->showDeleteModal = false;
        $this->deletingId = null;
        $this->deletingCertificate = null;
    }

    public function delete(): void
    {
        if ($this->deletingId) {
            $cert = Certificate::find($this->deletingId);
            if ($cert) {
                $num = $cert->certificate_number;
                $name = $cert->student_name;
                $cert->delete();
                session()->flash('success', "Certificate #{$num} for {$name} deleted successfully.");
            }
        }
        $this->showDeleteModal = false;
        $this->deletingId = null;
        $this->deletingCertificate = null;
    }

    public function render()
    {
        $query = Certificate::with('course')->latest();

        if ($this->search) {
            $term = '%' . trim($this->search) . '%';
            $query->where(function ($q) use ($term) {
                $q->where('student_name', 'like', $term)
                  ->orWhere('certificate_number', 'like', $term)
                  ->orWhere('course_name', 'like', $term)
                  ->orWhere('location', 'like', $term);
            });
        }

        return view('livewire.admin.certificate-index', [
            'certificates' => $query->paginate(10),
            'courses' => Course::orderBy('title')->get(),
        ])->layout('layouts.admin', ['header' => 'Certified Graduates Credentials Manager']);
    }
}
