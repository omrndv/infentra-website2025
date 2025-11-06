<x-layouts.auth title="Masuk">
    <div class="page-content d-flex align-items-center justify-content-center pt-5 mt-5" >
        <div class="row w-100 mx-0 auth-page">
            <div class="col-md-8 col-xl-4 col-lg-8 mx-auto">
                <div class="card" style="border: 4px solid #000; box-shadow: 6px 6px 0 0 #000; border-radius: 16px">
                    <div class="row flex-column-reverse flex-md-row">
                        <div class="col-md-12 col-xl-12 col-lg-12 ps-md-0">
                            <div class="auth-form-wrapper px-4 ps-5 py-5 pe-5">
                                <a
                                    href="{{ route('frontend.landing') }}"
                                    class="noble-ui-logo d-block mb-2">
                                    {{ $appSettings['title_login'] }}
                                </a>
                                <h6 class="text-muted fw-normal mb-5">
                                    Temukan ide baru, teman baru, dan semangat baru di Infentra!
                                </h6>
                                <form action="{{ route('login') }}" method="POST">
                                    @csrf
                                    @honeypot

                                    <x-input.email name="email" value="{{ old('email') }}" />
                                    <x-input.password name="password" label="Password" />
                                    <a href="{{ route('password.request') }}" class="d-block text-center mt-2">
                                        Lupa Password?
                                    </a>

                                    <x-button.primary class="w-100 mb-3 mt-4" type="submit">
                                        Masuk
                                    </x-button.primary>

                                    <a href="{{ route('register') }}">
                                        <x-button.primary-outline class="w-100" type="button">
                                            Daftar Team
                                        </x-button.primary-outline>
                                    </a>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-layouts.auth>