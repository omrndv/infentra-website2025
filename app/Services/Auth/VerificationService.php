<?php

namespace App\Services\Auth;

use App\Actions\SendOTPVerificationAction;
use App\Contracts\Models;
use App\Enums\OTPVerificationType;
use App\Foundations\Service;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class VerificationService extends Service
{
    public function __construct(
        private Models\OtpInterface $otpInterface,
        private Models\UserInterface $userInterface,
        private SendOTPVerificationAction $otpAction
    ) {}

    public function store(array $request): bool
    {
        try {
            $user = Auth::user();
            $user = $this->userInterface->findById($user->id, ['*'], ['otp']);

            if (!$user?->otp?->otp) {
                alert('OTP tidak ditemukan', '', 'error');
                return false;
            }

            if ($user->otp->otp !== $request['otp']) {
                alert('Kode OTP salah', '', 'error');
                return false;
            }

            if ($user->otp->expired_at < now()) {
                alert('Kode OTP sudah kadaluarsa', '', 'error');

                $id = $this->otpInterface->findByCustomId([['otp', '=', $user->otp->otp]], ['id'])->id;
                $this->otpInterface->deleteById($id);

                $this->otpAction->execute($user, OTPVerificationType::RESEND);
                alert('Kode OTP baru telah dikirim ke email Anda', '', 'success');
                return false;
            }

            if (!$user->hasVerifiedEmail()) {
                $user->markEmailAsVerified();
            }

            $id = $this->otpInterface->findByCustomId([['otp', '=', $user->otp->otp]], ['id'])->id;
            $this->otpInterface->deleteById($id);

            toast('Verifikasi email berhasil!', 'success');
            return true;
        } catch (\Throwable $th) {
            report($th);
            alert('Terjadi kesalahan sistem', '', 'error');
            return false;
        }
    }

    public function sendOtp(User $user)
    {
        return $this->otpAction->execute($user, OTPVerificationType::RESEND);
    }
}
