<?php

namespace App\Mail;

use App\Models\Application;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class PromoCodeUsedInfluencerMail extends Mailable
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
            subject: "Your Promo Code Was Used! - Diva House Beauty Academy",
        );
    }

    public function content(): Content
    {
        $influencerName = $this->application->influencer ? $this->application->influencer->name : 'Influencer Partner';
        $promoCodeStr = $this->application->promoCode ? $this->application->promoCode->code : 'Your Promo Code';
        $estimatedCommission = number_format($this->application->commission_amount) . ' ' . $this->application->currency;

        return new Content(
            htmlString: "
            <div style='font-family: Arial, sans-serif; padding: 20px; color: #333;'>
                <h2 style='color: #d97706;'>Great News, {$influencerName}! 🎉</h2>
                <p>A student just applied for Diva House Beauty Academy using your promo code <strong>{$promoCodeStr}</strong>!</p>
                <hr style='border: none; border-top: 1px solid #eee;' />
                <p><strong>Application Ref:</strong> {$this->application->reference_no}</p>
                <p><strong>Campus:</strong> {$this->application->location} Studio</p>
                <p><strong>Estimated Commission:</strong> {$estimatedCommission} (Pending Tuition Verification)</p>
                <hr style='border: none; border-top: 1px solid #eee;' />
                <p>Once the student completes their tuition payment, your commission will be marked as <strong>Confirmed Earned</strong> and queued for MoMo/Bank transfer!</p>
                <p style='font-size: 12px; color: #666;'>Check your Influencer Dashboard for full tracking details.</p>
            </div>
            ",
        );
    }
}
