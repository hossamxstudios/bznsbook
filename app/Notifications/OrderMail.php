<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class OrderMail extends Notification{

    use Queueable;
    protected $orderId;

    public function __construct( $orderId){
        $this->orderId = $orderId;
    }

    public function via(object $notifiable): array{
        return ['mail'];
    }

    public function toMail(object $notifiable): MailMessage{
        return (new MailMessage)
                ->subject('Order Invoice')
                ->greeting('Thank You For Ordering!')
                ->line('Your order has been placed successfully.')
                ->action('View Order', url('/customer/orders/'.$this->orderId));
    }

    public function toArray(object $notifiable): array{
        return [];
    }
}
