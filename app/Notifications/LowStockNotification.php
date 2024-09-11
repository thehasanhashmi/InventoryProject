<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class LowStockNotification extends Notification
{
    use Queueable;

    protected $product;

    public function __construct($product)
    {
        $this->product = $product;
    }

    public function via($notifiable)
    {
        return ['mail', 'database']; // Send via email and store in the database
    }

    public function toMail($notifiable)
    {
        return (new MailMessage)
            ->subject('Low Stock Alert')
            ->line("The stock for {$this->product->name} is running low.")
            ->action('Check Inventory', url('/inventory'))
            ->line('Please restock the item soon.');
    }

    public function toDatabase($notifiable)
    {
        return [
            'message' => "Low stock for {$this->product->name}.",
            'product_id' => $this->product->id,
            'action_url' => url('/inventory'),
        ];
    }
}
