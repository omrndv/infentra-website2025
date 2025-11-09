<x-layouts.auth title="Daftar">
    @pushOnce('style')
    <link rel="stylesheet" href="{{ asset('frontend/css/auth.css') }}">
    @endPushOnce

    <div class="page-content d-flex align-items-center justify-content-center" style="margin-bottom: 175px">
        <div class="row w-100 mx-0 auth-page">
            <div class="col-md-8 col-xl-6 mx-auto">
                <div class="mt-6">
                    <x-auth.progress-bar />
                </div>

                <div class="card mt-4 b" style="border: 4px solid #000; box-shadow: 6px 6px 0 0 #000; border-radius: 16px">
                    <div class="row flex-column-reverse flex-md-row">
                        <div class="col-md-12 ps-md-0">
                            <div class="auth-form-wrapper px-4 ps-5 py-5 pe-5">
                                <a href="{{ route('frontend.landing') }}" class="noble-ui-logo d-block mb-2">
                                    {{ $appSettings['title'] }}
                                </a>
                                <h5 class="text-muted fw-normal mb-4">
                                    Silahkan isi form berikut untuk mendaftar
                                </h5>

                                <form method="POST" action="{{ route('register.store') }}" enctype="multipart/form-data">
                                    @csrf
                                    @honeypot

                                    {{-- Tingkat Kompetisi --}}
                                    <x-input.select name="level" label="Tingkat Kompetisi" id="level">
                                        <option value="">Pilih Tingkat Kompetisi</option>
                                        @foreach ($levels as $level)
                                        <option
                                            value="{{ $level->id }}"
                                            data-display="{{ $level->display_as }}">
                                            {{ $level->display_as }}
                                        </option>
                                        @endforeach
                                    </x-input.select>

                                    {{-- Kompetisi --}}
                                    <x-input.select name="competition_id" label="Kompetisi" id="competition_id">
                                        <option value="">Pilih Kompetisi</option>
                                    </x-input.select>

                                    <span class="input-helpertext">
                                        * Jika kompetisi kosong, pastikan sudah memilih tingkat kompetisi
                                    </span>

                                    {{-- Data Tim --}}
                                    <x-input.text name="team_name" label="Nama Tim" value="{{ old('team_name') }}" />
                                    <x-input.text name="institution" label="Asal Institusi" value="{{ old('institution') }}" />
                                    <x-input.text name="leader_name" label="Nama Ketua" value="{{ old('leader_name') }}" />
                                    <x-input.text name="leader_phone" label="Nomor Telepon Ketua" value="{{ old('leader_phone') }}" />
                                    <x-input.file name="leader_card" label="Kartu Identitas Ketua" accept="image/*" />

                                    {{-- Field Pendamping --}}
                                    <div id="companion_fields" style="display:none;">
                                        <x-input.text
                                            name="companion_name"
                                            label="Nama Pendamping (Hanya untuk SMA/SMK)"
                                            id="companion_name"
                                            value="{{ old('companion_name') }}" />

                                        <x-input.file
                                            name="companion_card"
                                            label="Kartu Identitas Pendamping (Hanya untuk SMA/SMK)"
                                            id="companion_card"
                                            accept="image/*" />
                                    </div>

                                    {{-- Data Akun --}}
                                    <x-input.text name="email" label="Email Ketua" type="email" value="{{ old('email') }}" />
                                    <span class="input-helpertext">* Pastikan menggunakan email pribadi</span>
                                    <x-input.text name="password" label="Password" type="password" />
                                    <x-input.text name="password_confirmation" label="Konfirmasi Password" type="password" />

                                    <x-button.primary class="w-100 mb-3" type="submit" id="btn-submit">
                                        Daftar Tim
                                    </x-button.primary>

                                    <a href="{{ route('login') }}">
                                        <x-button.primary-outline class="w-100" type="button">
                                            Masuk
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

    @pushOnce('custom-scripts')
    <script>
        $('#btn-submit').click(function() {
            $(this).html(
                `<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> Loading...`
            ).prop('disabled', true);
            $(this).closest('form').submit();
        });

        $('#level').on('change', function() {
            const selectedLevelId = $(this).val();
            const selectedText = $(this).find(':selected').data('display');
            const competitionSelect = $('#competition_id');
            const companionFields = $('#companion_fields');

            competitionSelect.empty().append('<option value="">Pilih Kompetisi</option>');

            if (selectedLevelId) {
                $.ajax({
                    url: '{{ route("frontend.competition.index") }}',
                    type: 'GET',
                    dataType: 'json',
                    data: {
                        level: selectedLevelId,
                        platform: '{{ config("app.url") }}'
                    },
                    success: function(result) {
                        result.competitions.forEach(function(c) {
                            competitionSelect.append('<option value="' + c.id + '">' + c.name + '</option>');
                        });
                    }
                });
            }

            if (selectedText && selectedText.toLowerCase().includes('sma/smk atau universitas')) {
                companionFields.slideDown();
            } else {
                companionFields.slideUp();
            }
        });
    </script>
    @endPushOnce
</x-layouts.auth>