<?php

namespace App\Mail;

use App\Models\ClimateLeaders;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class ClimateLeaderSubmissionMail extends Mailable
{
    use Queueable, SerializesModels;

    public $climateLeader;

    /**
     * Create a new message instance.
     */
    public function __construct(ClimateLeaders $climateLeader)
    {
        $this->climateLeader = $climateLeader;
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            to: [$this->climateLeader->email],
            subject: 'Thank You for Your Climate Leaders Nomination - Saudi Climate Week 2026',
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            view: 'emails.climate-leader-submission',
            with: ['climateLeader' => $this->climateLeader],
        );
    }

    /**
     * Get the attachments for the message.
     *
     * @return array<int, \Illuminate\Mail\Mailables\Attachment>
     */
    public function attachments(): array
    {
        return [];
    }
}