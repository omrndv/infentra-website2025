<?php

namespace App\Http\Controllers\Auth;

use App\Foundations\Controller;
use App\Http\Requests\Auth\RegisterRequest;
use App\Services\Auth\RegisterService;

class RegisterController extends Controller
{
    public function __construct(
        private RegisterService $service
    ) {}

    /**
     * Tampilkan halaman registrasi.
     */
    public function index()
    {
        try {
            return view('pages.auth.register', $this->service->index());
        } catch (\Throwable $th) {
            return $this->redirectError($th);
        }
    }

    /**
     * Simpan data registrasi baru.
     */
    public function store(RegisterRequest $request)
    {
        try {
            $team = $this->service->store($request->validated());

            if ($team) {
                toast('Pendaftaran berhasil, silahkan cek email untuk melakukan verifikasi', 'success');
                return to_route('verification.notice');
            }

            // Jika gagal, redirect kembali dengan pesan error
            return back()->withInput()->withErrors(['error' => 'Pendaftaran gagal. Silakan coba lagi.']);
        } catch (\Throwable $th) {
            return $this->redirectError($th);
        }
    }
}
