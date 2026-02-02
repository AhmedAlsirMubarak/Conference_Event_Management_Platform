<?php

namespace App\Notifications;

use App\Models\ExhibitSubmission;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class ExhibitSubmissionNotification extends Notification
{
    use Queueable;

    public $submission;
    public $isForAdmin;

    /**
     * Create a new notification instance.
     */
    public function __construct(ExhibitSubmission $submission, $isForAdmin = true)
    {
        $this->submission = $submission;
        $this->isForAdmin = $isForAdmin;
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
     * Get the mail representation of the notification.
     */
    public function toMail(object $notifiable): MailMessage
    {
        if ($this->isForAdmin) {
            return (new MailMessage)
                ->subject('New Exhibit Submission - SCW')
                ->greeting('Hello ' . $notifiable->name . '!')
                ->line('A new exhibit submission has been received.')
                ->line('**Exhibit Details:**')
                ->line('Contact Person: ' . $this->submission->contact_person)
                ->line('Email: ' . $this->submission->email_address)
                ->line('Organization: ' . ($this->submission->organization_name ?? 'Not provided'))
                ->line('Country: ' . ($this->submission->country ?? 'Not provided'))
                ->line('Website: ' . ($this->submission->website ?? 'Not provided'))
                ->action('View Submission', url('/admin/exhibit-submissions/' . $this->submission->id))
                ->line('Thank you for using our platform!');
        } else {
            return (new MailMessage)
                ->subject('Exhibit Submission Received - SCW')
                ->greeting('Hello!')
                ->line('Thank you for submitting your exhibit enquiry.')
                ->line('We have received your submission and our team will review it shortly.')
                ->line('**Your Submission Details:**')
                ->line('Contact Person: ' . $this->submission->contact_person)
                ->line('Email: ' . $this->submission->email_address)
                ->action('View Your Submission', url('/user/exhibit-submissions/' . $this->submission->id))
                ->line('We will contact you soon!');
        }
    }

    /**
     * Get the array representation of the notification.
     *
     * @return array<string, mixed>
     */
    public function toArray(object $notifiable): array
    {
        if ($this->isForAdmin) {
            return [
                'submission_id' => $this->submission->id,
                'contact_person' => $this->submission->contact_person,
                'email_address' => $this->submission->email_address,
                'organization_name' => $this->submission->organization_name,
                'country' => $this->submission->country,
                'website' => $this->submission->website,
                'message' => "New exhibit submission from {$this->submission->contact_person}",
                'url' => url('/admin/exhibit-submissions/' . $this->submission->id),
            ];
        } else {
            return [
                'submission_id' => $this->submission->id,
                'contact_person' => $this->submission->contact_person,
                'message' => "Your exhibit submission has been received successfully",
                'url' => url('/user/exhibit-submissions/' . $this->submission->id),
            ];
        }
    }
}