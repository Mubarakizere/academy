<?php

namespace App\Mail;

use App\Models\Application;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class CommissionVerifiedInfluencerMail extends Mailable
{
    use Queueable, SerializesModels;

    public Application $application;
    public string $type; // 'verified' or 'transferred'

    public function __construct(Application $application, string $type = 'verified')
    {
        $this->application = $application;
        $this->type = $type;
    }

    public function envelope(): Envelope
    {
        $subject = $this->type === 'transferred'
            ? "Commission Payout Transferred! - Diva House Beauty Academy"
            : "Commission Confirmed! - Diva House Beauty Academy";

        return new Envelope(subject: $subject);
    }

    public function content(): Content
    {
        $amount = number_format($this->application->commission_amount) . ' ' . $this->application->currency;
        $influencerName = $this->application->influencer ? $this->application->influencer->name : 'Influencer Partner';

        if ($this->type === 'transferred') {
            $body = "
            <h2 style='color: #059669;'>Payout Transferred Successfully! 💰</h2>
            <p>Dear {$influencerName}, your earned commission of <strong>{$amount}</strong> for referral <strong>{$this->application->reference_no}</strong> has been transferred to your designated MoMo / Bank payout account!</p>
            <p><strong>Transaction Reference:</strong> " . ($this->application->payout_reference ?? 'N/A') . "</p>
            ";
        } else {
            $body = "
            <h2 style='color: #d97706;'>Commission Payment Confirmed! ✅</h2>
            <p>Dear {$influencerName}, student tuition for <strong>{$this->application->reference_no}</strong> has been verified by our admissions office.</p>
            <p>Your commission of <strong>{$amount}</strong> is now marked as <strong>Confirmed Earned</strong> and ready for payout transfer!</p>
            ";
        }

        return new Content(
            htmlString: "
            <div style='font-family: Arial, sans-serif; padding: 20px; color: #333;'>
                {$body}
                <hr style='border: none; border-top: 1px solid #eee;' />
                <p style='font-size: 12px; color: #666;'>Thank you for partnering with Diva House Beauty Academy.</p>
            </div>
            ",
        );
    }
}
