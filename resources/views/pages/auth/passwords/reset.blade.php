<x-layouts.auth title="Reset Password">
    <div class="page-content d-flex align-items-center justify-content-center">
        <div class="row w-100 mx-0 auth-page">
            <div class="col-md-8 col-xl-4 mx-auto">
                <div class="card">
                    <div class="auth-form-wrapper px-4 ps-5 py-5 pe-5">
                        <h5 class="text-muted fw-normal mb-4">
                            Silahkan masukkan password baru Anda
                        </h5>

                        <form method="POST" action="{{ route('password.update') }}">
                            @csrf
                            <input type="hidden" name="token" value="{{ $token }}">

                            <x-input.email name="email" value="{{ old('email') }}" />
                            <x-input.password name="password" label="Password Baru" />
                            <x-input.password name="password_confirmation" label="Konfirmasi Password" />

                            <x-button.primary class="w-100 mt-3" type="submit">
                                Reset Password
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