<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Queue\SerializesModels;

class WebinarMail extends Mailable
{
    use Queueable, SerializesModels;

    protected $details;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($details)
    {
        $param = [
            '$webinarname' => $details['webinar_name'],
        ];
        $this->message = (new MailMessage)->subject(strtr($details['subject'], $param));
        if(isset($details['greeting']))
            $this->message->greeting(strtr($details['greeting'], $param));
        $lines = explode("\n",$details['message']);
        foreach ($lines as $line)
            $this->message->line(strtr($line, $param));
        if(isset($this->details['action_name']))
            $this->message->action(strtr($details['action_name'], $param), $details['action_url']);
        if(isset($this->details['salutation']))
            $this->message->salutation(strtr($details['salutation'], $param));
        if(isset($this->details['attachment']))
            $this->message->attach($details['attachment'], ['as'=>$details['attachment_name'], 'mime'=>$details['attachment_mime']]);
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('vendor.notifications.email', $this->message->data());
    }
}
