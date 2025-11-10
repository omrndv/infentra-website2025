<x-layouts.auth title="Lupa Password">
    <div class="page-content d-flex align-items-center justify-content-center pt-5 mt-5">
        <div class="row w-100 mx-0 auth-page">
            <div class="col-md-8 col-xl-4 mx-auto">
                <div class="card" style="border: 4px solid #000; box-shadow: 6px 6px 0 0 #000; border-radius: 16px;">
                    <div class="auth-form-wrapper px-4 ps-5 py-5 pe-5">
                        <h5 class="text-muted fw-normal mb-4">
                            Masukkan email Anda untuk menerima link reset password
                        </h5>

                        @if (session('status'))
                        <div class="alert alert-success">{{ session('status') }}</div>
                        @endif

                        <form method="POST" action="{{ route('password.email') }}">
                            @csrf
                            <x-input.email name="email" value="{{ old('email') }}" />

                            <x-button.primary class="w-100 mt-3" type="submit">
                                Kirim Link Reset Password
                            </x-button.primary>

                            <div class="text-center mt-3">
                                <a href="{{ route('login') }}">Kembali ke Login</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-layouts.auth>