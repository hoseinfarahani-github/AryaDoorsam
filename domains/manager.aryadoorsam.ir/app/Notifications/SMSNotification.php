<?php

namespace App\Notifications;

use App\Models\Ticket\Ticket;
use App\Models\User\User;
use App\Notifications\Channels\GhasedakChannel;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class SMSNotification extends Notification
{
    use Queueable;
    public $ticket=null;
    public $receiver=null;
    public $receiver_name=null;

    public $sender=null;
    public $sender_name=null;


    /**
     * Create a new notification instance.
     */
    public function __construct(Ticket $ticket)
    {
        $this->ticket=$ticket;
        $this->receiver=User::find($this->ticket->receiver);
        $this->receiver_name=__('users.'.$this->receiver->username);
        $this->sender=User::find($this->ticket->sender);
        $this->sender_name=__('users.'.$this->sender->username);
    }

    /**
     * Get the notification's delivery channels.
     *
     * @return array<int, string>
     */
    public function via(object $notifiable): array
    {
        return [GhasedakChannel::class];
    }

    public function toGhasedakSMS($notifiable): array
    {
        return[
          'text'=>"تیکت جدیدی برای شما با عنوان {$this->ticket->title} توسط {$this->sender_name} ارسال شده است ",
        ];

    }

}
