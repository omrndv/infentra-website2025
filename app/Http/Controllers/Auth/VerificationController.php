<?php

namespace App\Http\Controllers\Auth;

use App\Foundations\Controller;
use App\Services\Auth\VerificationService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class VerificationController extends Controller
{
    public function __construct(private VerificationService $service) {}

    public function index()
    {
        return view('pages.auth.verification-email');
    }

    public function store(Request $request)
    {
        $request->validate([
            'otp' => 'required|string',
        ]);

        $result = $this->service->store($request->only('otp'));

        if ($result) {
            return redirect()->route('team-members')->with('success', 'Email berhasil diverifikasi!');
        }

        return back()->withInput()->withErrors(['otp' => 'Kode OTP salah atau tidak valid.']);
    }


    public function resend(Request $request)
    {
        $user = Auth::user();

        if (!$user) {
            return response()->json([
                'success' => false,
                'message' => 'Anda belum login.',
            ], 401);
        }

        try {
            $this->service->sendOtp($user);

            return response()->json([
                'success' => true,
                'message' => 'Kode OTP baru telah dikirim ke email Anda.',
            ]);
        } catch (\Throwable $e) {
            report($e);

            return response()->json([
                'success' => false,
                'message' => 'Gagal mengirim ulang OTP: ' . $e->getMessage(),
            ], 500);
        }
    }
}
