<x-layouts.auth title="Verifikasi Email">
    @pushOnce('style')
    <link rel="stylesheet" href="{{ asset('frontend/css/auth.css') }}">
    @endPushOnce

    <div class="page-content d-flex align-items-center justify-content-center">
        <div class="row w-100 mx-0 auth-page">
            <div class="col-md-8 col-xl-6 mx-auto">
                <div class="mt-6">
                    <x-auth.progress-bar />
                </div>

                <div class="card mt-4">
                    <div class="row flex-column-reverse flex-md-row">
                        <div class="col-md-12 ps-md-0">
                            <div class="auth-form-wrapper px-4 ps-5 py-5 pe-5">
                                <a href="{{ route('frontend.landing') }}" class="noble-ui-logo d-block mb-2">
                                    Verifikasi Email
                                </a>
                                <h5 class="text-muted fw-normal mb-4">
                                    Masukkan kode verifikasi yang dikirim ke email Anda.
                                </h5>

                                <form action="{{ route('verification.store') }}" method="POST">
                                    @csrf
                                    @honeypot
                                    <x-input.text name="otp" label="Kode OTP" />
                                    <x-button.primary class="w-100 mb-3" type="submit">Verifikasi</x-button.primary>

                                    <div class="text-center mt-2">
                                        <button type="button" id="resend-otp-btn" class="btn btn-link p-0 text-decoration-none">
                                            Kirim ulang kode OTP
                                        </button>
                                        <p id="countdown" class="text-muted mt-1" style="display: none;"></p>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @push('custom-scripts')

    <script>
        document.addEventListener("DOMContentLoaded", () => {
            const resendBtn = document.getElementById("resend-otp-btn");
            const countdownEl = document.getElementById("countdown");

            if (!resendBtn) {
                console.error("Tombol kirim ulang OTP tidak ditemukan.");
                return;
            }

            resendBtn.addEventListener("click", async () => {
                resendBtn.disabled = true;

                try {
                    const response = await fetch("{{ route('verification.resend') }}", {
                        method: "POST",
                        headers: {
                            "X-CSRF-TOKEN": "{{ csrf_token() }}",
                            "Accept": "application/json",
                        },
                    });

                    console.log("Status:", response.status);

                    const data = await response.json().catch(() => null);
                    if (!data) {
                        alert("Response server tidak valid (kemungkinan error 419/500)");
                        resendBtn.disabled = false;
                        return;
                    }

                    alert(data.message);

                    if (data.success) startCountdown(60);
                    else resendBtn.disabled = false;

                } catch (error) {
                    console.error("Error fetch:", error);
                    alert("Terjadi kesalahan koneksi ke server.");
                    resendBtn.disabled = false;
                }
            });

            function startCountdown(seconds) {
                let remaining = seconds;
                countdownEl.style.display = "block";
                countdownEl.textContent = `Tunggu ${remaining} detik untuk kirim ulang.`;

                const timer = setInterval(() => {
                    remaining--;
                    countdownEl.textContent = `Tunggu ${remaining} detik untuk kirim ulang.`;

                    if (remaining <= 0) {
                        clearInterval(timer);
                        countdownEl.style.display = "none";
                        resendBtn.disabled = false;
                    }
                }, 1000);
            }
        });
    </script>
    @endpush
</x-layouts.auth>