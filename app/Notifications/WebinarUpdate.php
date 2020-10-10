<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class WebinarUpdate extends Notification
{
    use Queueable;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        return (new MailMessage)
            ->subject('Webinar Update')
            ->greeting('Halo, '.$notifiable->name)
            ->line('Terimakasih sudah mendaftar di webinar STEI Private : NO DATA IS SAFE.')
            ->line('Sekedar pemberitahuan, webinar akan diselenggarakan besok pada tanggal 11 Oktober 2020.')
            ->line('Link webinar serta virtual background akan dikirimkan kurang lebih satu jam sebelum dimulai acara (7:45 AM)')
            ->line('Terimakasih atas perhatiannya~');
    }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        return [
            //
        ];
    }
}
