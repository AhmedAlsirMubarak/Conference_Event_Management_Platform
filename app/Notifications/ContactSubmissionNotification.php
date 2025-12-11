<?php

namespace App\Notifications;

use App\Models\contacts;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class ContactSubmissionNotification extends Notification
{
    public $contact;

    /**
     * Create a new notification instance.
     */
    public function __construct(contacts $contact)
    {
        $this->contact = $contact;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @return array<int, string>
     */
    public function via(object $notifiable): array
    {
        return ['mail', 'database'];
    }

    /**
     * Get the mail representation of the notification.
     */
    public function toMail(object $notifiable): MailMessage
    {
        return (new MailMessage)
            ->subject('New Contact Submission - SCW')
            ->greeting('Hello ' . $notifiable->name . '!')
            ->line('A new contact has been submitted.')
            ->line('**Contact Details:**')
            ->line('Name: ' . $this->contact->Name)
            ->line('Email: ' . $this->contact->Email)
            ->line('Phone: ' . $this->contact->Phone)
            ->line('Company: ' . ($this->contact->Company ?? 'Not provided'))
            ->line('Designation: ' . ($this->contact->Designation ?? 'Not provided'))
            ->action('View Contact', url('/contacts/' . $this->contact->id))
            ->line('Thank you for using our platform!');
    }

    /**
     * Get the array representation of the notification.
     *
     * @return array<string, mixed>
     */
    public function toArray(object $notifiable): array
    {
        return [
            'contact_id' => $this->contact->id,
            'contact_name' => $this->contact->Name,
            'contact_email' => $this->contact->Email,
            'contact_phone' => $this->contact->Phone,
            'contact_company' => $this->contact->Company,
            'message' => "New contact submission from {$this->contact->Name}",
            'url' => url('/contacts/' . $this->contact->id),
        ];
    }
}
