<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class BookingStatusChanged extends Notification
{
    use Queueable;

    public $id;
    protected $status;

    public function __construct($id,$status)
    {
        $this->id = $id;
        $this->status = $status;
    }

    public function via($notifiable)
    {
        return ['database'];
    }

    public function toDatabase($notifiable)
    {
        return [
            'booking_id' => $this->id,
            'status' => $this->status,
            'message' => 'Your booking status changed to ' . $this->status,
        ];
    }
}
