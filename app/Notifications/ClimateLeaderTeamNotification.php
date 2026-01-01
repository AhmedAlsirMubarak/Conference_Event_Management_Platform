<?php

namespace App\Notifications;

use App\Models\ClimateLeaders;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class ClimateLeaderTeamNotification extends Notification
{
    public $climateLeader;

    /**
     * Create a new notification instance.
     */
    public function __construct(ClimateLeaders $climateLeader)
    {
        $this->climateLeader = $climateLeader;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @return array<int, string>
     */
    public function via(object $notifiable): array
    {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     */
    public function toMail(object $notifiable): MailMessage
    {
        return (new MailMessage)
            ->subject('New Climate Leaders Nomination Received - ' . $this->climateLeader->fullname)
            ->greeting('Hello SCW Team,')
            ->line('A new Climate Leader nomination has been submitted.')
            ->line('')
            ->line('**Nominee Information:**')
            ->line('Submission ID: #' . $this->climateLeader->id)
            ->line('Full Name: ' . $this->climateLeader->fullname)
            ->line('Email: ' . $this->climateLeader->email)
            ->line('Phone: ' . $this->climateLeader->country_code . ' ' . $this->climateLeader->phone)
            ->line('Organization: ' . $this->climateLeader->organization)
            ->line('')
            ->line('**Background:**')
            ->line('Country of Nationality: ' . $this->climateLeader->Country_of_Nationality)
            ->line('Country of Residence: ' . $this->climateLeader->Country_of_Residence)
            ->line('')
            ->line('**Biography:**')
            ->line($this->climateLeader->bio)
            ->line('')
            ->line('**LinkedIn Profile:**')
            ->line($this->climateLeader->linkedin_profile ?? 'Not provided')
            ->line('')
            ->line('**Additional Notes:**')
            ->line($this->climateLeader->notes ?? 'No additional notes')
            ->line('')
            ->line('Submission Date: ' . $this->climateLeader->created_at->format('F j, Y \a\t g:i A'))
            ->action('View in Admin Panel', url('/admin/climate-leaders/' . $this->climateLeader->id))
            ->line('')
            ->line('Saudi Climate Week 2026 Admin Team');
    }
}
