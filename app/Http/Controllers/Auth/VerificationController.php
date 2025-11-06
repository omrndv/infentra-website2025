<?php

namespace App\Http\Controllers\Auth;

use App\Foundations\Controller;
use App\Services\Auth\VerificationService;
use Illuminate\Http\Request;

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
}
