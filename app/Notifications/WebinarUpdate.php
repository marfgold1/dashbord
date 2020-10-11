<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class WebinarUpdate extends Notification
{
    use Queueable;

    protected $details;
    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($details)
    {
        $this->details = $details;
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
        $param = [
            '$username' =>  $notifiable->name,
            '$webinarname' => $this->details['webinar_name'],
        ];
        $mail = (new MailMessage)->subject(strtr($this->details['subject'], $param));
        if(isset($this->details['greeting']))
            $mail->greeting(strtr($this->details['greeting'], $param));
        $lines = explode("\n",$this->details['message']);
        foreach ($lines as $line)
            $mail->line(strtr($line, $param));
        if(isset($this->details['action_name']))
            $mail->action(strtr($this->details['action_name'], $param), $this->details['action_url']);
        if(isset($this->details['salutation']))
            $mail->salutation(strtr($this->details['salutation'], $param));
        if(isset($this->details['attachment']))
            $mail->attach($this->details['attachment'], ['as'=>$this->details['attachment_name'], 'mime'=>$this->details['attachment_mime']]);
        return $mail;
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
