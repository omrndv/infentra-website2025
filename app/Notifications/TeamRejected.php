<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Notifications\Messages\MailMessage;

class TeamRejected extends Notification
{
    use Queueable;

    public function __construct(private string $reason) {}

    public function via(object $notifiable): array
    {
        return ['mail'];
    }

    public function toMail(object $notifiable): MailMessage
    {
        $team = $notifiable->leader?->team;
        $url = $team ? url('/reupload/' . $team->id) : url('/');

        return (new MailMessage)
            ->subject('Tim Anda Tidak Disetujui - InvFest x ISF 9.0')
            ->greeting('Halo, ' . ($notifiable->name ?? 'Peserta') . '!')
            ->line('Maaf, tim kamu belum memenuhi persyaratan yang ada.')
            ->line('**Alasan Penolakan:**')
            ->line('➡️ ' . $this->reason)
            ->line('Silakan memperbarui dokumen melalui tautan di bawah ini.')
            ->action('Upload Ulang Dokumen', $url)
            ->line('Pastikan seluruh data sudah benar sebelum dikirim ulang.');
    }
}
