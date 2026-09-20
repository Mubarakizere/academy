<?php

namespace App\Livewire\Public;

use App\Models\Certificate;
use Livewire\Component;

class CertificateVerification extends Component
{
    public string $query = '';
    public bool $searched = false;
    public ?int $selectedId = null;

    public function searchCertificates(): void
    {
        $this->query = trim($this->query);
        $this->searched = true;
        $this->selectedId = null;
    }

    public function selectCert(int $id): void
    {
        $this->selectedId = $id;
    }

    public function resetSearch(): void
    {
        $this->query = '';
        $this->searched = false;
        $this->selectedId = null;
    }

    public function render()
    {
        $results = collect();
        $selectedCert = null;

        if ($this->searched && !empty($this->query)) {
            $term = '%' . $this->query . '%';
            $results = Certificate::where('is_valid', true)
                ->where(function ($q) use ($term) {
                    $q->where('student_name', 'like', $term)
                      ->orWhere('certificate_number', 'like', $term)
                      ->orWhere('course_name', 'like', $term);
                })
                ->latest('issue_date')
                ->get();

            if ($this->selectedId) {
                $selectedCert = $results->firstWhere('id', $this->selectedId);
            } elseif ($results->count() === 1) {
                $selectedCert = $results->first();
            }
        }

        return view('livewire.public.certificate-verification', [
            'results' => $results,
            'selectedCert' => $selectedCert,
        ]);
    }
}
