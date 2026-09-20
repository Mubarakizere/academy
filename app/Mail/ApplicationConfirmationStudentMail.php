<?php

namespace App\Mail;

use App\Models\Application;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class ApplicationConfirmationStudentMail extends Mailable
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
            subject: "Application Received [{$this->application->reference_no}] - Diva House Beauty Academy",
        );
    }

    public function content(): Content
    {
        $courseName = $this->application->course ? $this->application->course->name : 'Beauty Program';
        $formattedFinal = number_format($this->application->final_price) . ' ' . $this->application->currency;
        $formattedOriginal = number_format($this->application->original_price) . ' ' . $this->application->currency;
        $formattedDiscount = number_format($this->application->discount_amount) . ' ' . $this->application->currency;

        return new Content(
            htmlString: "
            <div style='font-family: Arial, sans-serif; padding: 20px; color: #333;'>
                <h2 style='color: #d97706;'>Welcome to Diva House Beauty Academy! ✨</h2>
                <p>Dear {$this->application->full_name},</p>
                <p>We have successfully received your intake application for <strong>{$courseName}</strong> at our <strong>{$this->application->location} Studio</strong>.</p>
                <hr style='border: none; border-top: 1px solid #eee;' />
                <h4 style='margin-bottom: 5px;'>Tuition & Application Summary</h4>
                <p><strong>Reference Number:</strong> {$this->application->reference_no}</p>
                <p><strong>Schedule Track:</strong> " . strtoupper($this->application->schedule) . "</p>
                <p><strong>Original Tuition:</strong> {$formattedOriginal}</p>
                " . ($this->application->discount_amount > 0 ? "<p style='color: #059669;'><strong>Promo Discount Applied:</strong> -{$formattedDiscount}</p>" : "") . "
                <p style='font-size: 16px; color: #d97706;'><strong>Final Tuition Payable:</strong> {$formattedFinal}</p>
                <hr style='border: none; border-top: 1px solid #eee;' />
                <p>Our admissions coordinator will contact you via WhatsApp / Email within 24 hours with studio location details and payment instructions.</p>
                <p style='font-size: 12px; color: #666;'>Diva House Beauty Academy - Rwanda & Kenya Hubs</p>
            </div>
            ",
        );
    }
}
