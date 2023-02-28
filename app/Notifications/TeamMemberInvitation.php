<?php

namespace App\Notifications;

use App\Models\Team;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use Illuminate\Support\Facades\URL;

class TeamMemberInvitation extends Notification
{
    use Queueable;

    public Team $team;
    public string $url;

    /**
     * Create a new notification instance.
     */
    public function __construct(Team $team)
    {
        $this->team = $team;
        $this->url  = URL::signedRoute('team.accept', $team, now()->addWeek());
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param mixed $notifiable
     *
     * @return array
     */
    public function via($notifiable)
    {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param mixed $notifiable
     *
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        return (new MailMessage())
            ->subject(sprintf(
                '%s invited you to %s team',
                config('app.name'),
                $this->team->name
            ))
            ->line('Hi,')
            ->line(sprintf('You have been invited to join %s team.', $this->team->name))
            ->line('This invitation will expire in 7 days.')
            ->action('Accept invitation', url($this->url))
            ->line('Thank you for using our application!');
    }

    /**
     * Get the array representation of the notification.
     *
     * @param mixed $notifiable
     *
     * @return array
     */
    public function toArray($notifiable)
    {
        return [
        ];
    }
}
