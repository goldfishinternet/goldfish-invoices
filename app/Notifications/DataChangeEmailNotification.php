<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class DataChangeEmailNotification extends Notification
{
    use Queueable;

    protected $payload;

    public function __construct(array $payload)
    {
        $this->payload = $payload;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param mixed $notifiable
     */
    public function via($notifiable): array
    {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param mixed $notifiable
     */
    public function toMail($notifiable): MailMessage
    {
        $recipientName = data_get($notifiable, 'name', '');
        $recipientName = $recipientName ? ' ' . $recipientName : '';

        $reasonName = data_get($this->payload['reason'], 'name', '');
        $reasonName = $reasonName ? ' ' . $reasonName : 'User';

        return (new MailMessage())
            ->subject(sprintf(
                '[%s]%s %s %s',
                config('app.name'),
                $reasonName,
                $this->payload['action'],
                $this->payload['model']
            ))
            ->greeting('Hi' . $recipientName . ',')
            ->line(sprintf(
                '%s **%s** entry **%s**',
                $reasonName,
                $this->payload['action'],
                $this->payload['model']
            ))
            ->line('Please log in if any action needs to be taken.')
            ->action('Login to ' . config('app.name'), url('/'))
            ->line('This is an automated message.')
            ->salutation(config('app.name') . ' Team');
    }

    /**
     * Get the array representation of the notification.
     *
     * @param mixed $notifiable
     */
    public function toArray($notifiable): array
    {
        return $this->payload;
    }
}
