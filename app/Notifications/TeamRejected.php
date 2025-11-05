<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class TeamRejected extends Notification
{
    use Queueable;

    protected string $reason;

    public function __construct(string $reason)
    {
        $this->reason = $reason;
    }

    public function via(object $notifiable): array
    {
        return ['mail'];
    }

    public function toMail(object $notifiable): MailMessage
    {
        return (new MailMessage)
            ->subject('Tim Anda Tidak Disetujui - InvFest x ISF 9.0')
            ->greeting('Halo, ' . ($notifiable->name ?? 'Peserta') . '!')
            ->line('Maaf, tim kamu belum memenuhi persyaratan yang ada.')
            ->line('**Alasan Penolakan:**')
            ->line('➡️ ' . $this->reason)
            ->line('Jangan khawatir, kamu masih bisa daftar ulang melalui tautan di bawah.')
            ->action('Daftar Ulang', url('/register'))
            ->line('Pastikan tim kamu memenuhi semua syarat agar bisa diterima. Semangat!');
    }
}
