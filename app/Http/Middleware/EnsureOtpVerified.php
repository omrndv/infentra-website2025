<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EnsureOtpVerified
{
    public function handle(Request $request, Closure $next)
    {
        $user = Auth::user();

        // Jika belum login, redirect ke login
        if (!$user) {
            return redirect()->route('login.index');
        }

        // Jika belum verifikasi OTP/email
        if (!$user->email_verified_at) {
            return redirect()->route('verification.notice')
                ->with('warning', 'Silakan verifikasi email terlebih dahulu.');
        }

        // Jika tim belum lengkap, arahkan ke halaman pendaftaran anggota
        $leader = $user->leader ?? null;
        $team = $leader->team ?? null;
        $memberCount = $team?->members?->count() ?? 0;
        $payment = $team?->payment ?? null;

        if ($request->routeIs('team-members*') && $memberCount > 0) {
            return redirect()->route('payment-team.index');
        }

        if ($request->routeIs('payment-team*') && $payment) {
            return redirect()->route('frontend.team.dashboard');
        }

        if ($request->routeIs('team.dashboard') || $request->routeIs('team.work*')) {
            if ($memberCount === 0) return redirect()->route('team-members.index');
            if (!$payment) return redirect()->route('payment-team.index');
            if ($payment?->status === 'pending' && $request->routeIs('team.work*')) {
                return redirect()->route('frontend.team.dashboard');
            }
        }

        return $next($request);
    }
}
