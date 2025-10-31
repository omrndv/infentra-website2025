<?php

namespace App\Http\Controllers\Auth;

use App\Foundations\Controller;
use App\Services\Auth\VerificationService;
use Illuminate\Http\Request;

class VerificationController extends Controller
{
    public function __construct(private VerificationService $service) {}

    /**
     * Tampilkan halaman input OTP / verifikasi email
     */
    public function index()
    {
        return view('pages.auth.verification-email');
    }

    /**
     * Proses verifikasi OTP dari form
     */
    public function store(Request $request)
    {
        $request->validate([
            'otp' => 'required|string',
        ]);

        $result = $this->service->store($request->only('otp'));

        if ($result) {
            // redirect ke halaman team member jika berhasil
            return redirect()->route('team-members.index');
        }

        // jika gagal, kembali ke halaman OTP
        return back()->withInput();
    }
}
