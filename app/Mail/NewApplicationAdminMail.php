<?php

namespace App\Mail;

use App\Models\Application;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class NewApplicationAdminMail extends Mailable
{
    use Queueable, SerializesModels;

    public Application $application;

    public function __construct(Application $application)
    {
        $this->application = $application;
    }

    public function envelope(): Envelope
    {
        return new Envelope(
            subject: "New Student Application [{$this->application->reference_no}] - {$this->application->full_name}",
        );
    }

    public function content(): Content
    {
        return new Content(
            htmlString: "
            <div style='font-family: Arial, sans-serif; padding: 20px; color: #333;'>
                <h2 style='color: #d97706;'>New Student Intake Application</h2>
                <p>A new student has submitted an application on the Diva House Beauty Academy portal.</p>
                <hr style='border: none; border-top: 1px solid #eee;' />
                <p><strong>Reference No:</strong> {$this->application->reference_no}</p>
                <p><strong>Student Name:</strong> {$this->application->full_name}</p>
                <p><strong>Email:</strong> {$this->application->email}</p>
                <p><strong>Phone:</strong> {$this->application->phone_code} {$this->application->phone}</p>
                <p><strong>Location:</strong> {$this->application->location} Studio</p>
                <p><strong>Course:</strong> " . ($this->application->course ? $this->application->course->name : 'N/A') . "</p>
                <p><strong>Schedule:</strong> " . strtoupper($this->application->schedule) . "</p>
                <p><strong>Tuition Total:</strong> " . number_format($this->application->final_price) . " {$this->application->currency}</p>
                " . ($this->application->promoCode ? "<p><strong>Promo Code Used:</strong> {$this->application->promoCode->code}</p>" : "") . "
                <hr style='border: none; border-top: 1px solid #eee;' />
                <p style='font-size: 12px; color: #666;'>Please verify tuition payment in the Admin Dashboard to confirm enrollment.</p>
            </div>
            ",
        );
    }
}
