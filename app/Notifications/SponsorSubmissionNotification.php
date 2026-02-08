<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use App\Models\SponsorSubmission;

class SponsorSubmissionNotification extends Notification
{
    use Queueable;

    protected $submission;
    protected $isAdmin;

    /**
     * Create a new notification instance.
     */
    public function __construct(SponsorSubmission $submission, bool $isAdmin = false)
    {
        $this->submission = $submission;
        $this->isAdmin = $isAdmin;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @return array<int, string>
     */
    public function via(object $notifiable): array
    {
        return ['database'];
    }

    /**
     * Get the array representation of the notification.
     *
     * @return array<string, mixed>
     */
    public function toArray(object $notifiable): array
    {
        if ($this->isAdmin) {
            return [
                'title' => 'New Sponsor Submission',
                'message' => "New sponsor submission from {$this->submission->organization_name} by {$this->submission->contact_person}",
                'type' => 'sponsor_submission',
                'submission_id' => $this->submission->id,
                'route' => route('sponsor-submissions.show', $this->submission->id),
                'icon' => 'briefcase',
                'color' => 'purple'
            ];
        } else {
            return [
                'title' => 'New Sponsor Submission',
                'message' => "New sponsor submission from {$this->submission->organization_name}",
                'type' => 'sponsor_submission',
                'submission_id' => $this->submission->id,
                'route' => route('user.sponsor-submissions.show', $this->submission->id),
                'icon' => 'briefcase',
                'color' => 'purple'
            ];
        }
    }
}
