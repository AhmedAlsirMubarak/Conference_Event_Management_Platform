<?php

namespace App\Notifications;

use App\Models\ClimateLeaders;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class ClimateLeaderSubmissionNotification extends Notification
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
            ->subject('Thank You for Your Climate Leaders Nomination - Saudi Climate Week 2026')
            ->greeting('Dear ' . $this->climateLeader->fullname . ',')
            ->line('Thank you for submitting your nomination to become a Climate Leader at Saudi Climate Week 2026!')
            ->line('')
            ->line('We have successfully received your submission. Our selection committee will review your application and get back to you shortly.')
            ->line('')
            ->line('**Your Submission Summary:**')
            ->line('Name: ' . $this->climateLeader->fullname)
            ->line('Email: ' . $this->climateLeader->email)
            ->line('Phone: ' . $this->climateLeader->country_code . ' ' . $this->climateLeader->phone)
            ->line('Organization: ' . $this->climateLeader->organization)
            ->line('Country of Nationality: ' . $this->climateLeader->Country_of_Nationality)
            ->line('Country of Residence: ' . $this->climateLeader->Country_of_Residence)
            ->line('LinkedIn Profile: ' . ($this->climateLeader->linkedin_profile ?? 'Not provided'))
            ->line('')
            ->line('Thank you for your commitment to climate leadership and sustainability!')
            ->line('')
            ->line('Best regards,')
            ->line('Saudi Climate Week 2026 Team');
    }
}