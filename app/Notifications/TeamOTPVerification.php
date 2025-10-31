<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Notifications\Messages\MailMessage;

class TeamOTPVerification extends Notification
{
    use Queueable;

    private string $otp;

    public function __construct(string $otp)
    {
        $this->otp = $otp;
    }

    public function via($notifiable)
    {
        return ['mail'];
    }

    public function toMail($notifiable)
    {
        return (new MailMessage)
            ->subject('Kode OTP Verifikasi Email')
            ->greeting("Halo {$notifiable->name},")
            ->line("Berikut kode OTP untuk verifikasi email Anda:")
            ->line("**{$this->otp}**")
            ->line('Kode ini berlaku selama 3 jam.')
            ->line('Jika Anda tidak meminta OTP ini, abaikan email ini.');
    }

    public function toArray($notifiable)
    {
        return [
            'otp' => $this->otp,
        ];
    }
}
