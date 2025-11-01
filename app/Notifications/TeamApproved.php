<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class TeamApproved extends Notification
{
    use Queueable;

    protected string $whatsapp_link;

    public function __construct(string $whatsapp_link)
    {
        $this->whatsapp_link = $whatsapp_link;
    }

    public function via(object $notifiable): array
    {
        return ['mail'];
    }

    public function toMail(object $notifiable): MailMessage
    {
        return (new MailMessage)
            ->subject('Tim Anda Telah Diterima! 🎉')
            ->greeting("Halo, {$notifiable->name}!")
            ->line('Selamat! Tim Anda telah disetujui oleh Panitia.')
            ->line('Silakan bergabung ke grup WhatsApp berikut untuk informasi lebih lanjut mengenai kompetisi.')
            ->action('Gabung ke Grup WhatsApp', $this->whatsapp_link)
            ->line('Terima kasih telah berpartisipasi dalam acara **' . config('app.name') . '**.')
            ->salutation('Salam hangat,  
Panitia ' . config('app.name'));
    }

    public function toArray(object $notifiable): array
    {
        return [];
    }
}
