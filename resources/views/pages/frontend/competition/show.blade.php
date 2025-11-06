<x-layouts.frontend title="{{ $competition->name }}" description="{{ $competition->description }}">
    <div class="container mt-5 d-flex justify-content-between gap-5 flex-column flex-md-row align-items-start">
        <div style="flex: 0 0 50%; max-width: 1000px;">
            <img
                src="{{ $competition->poster ?? '#' }}"
                class="img-fluid rounded-2 shadow-sm border"
                alt="{{ $competition->name }}"
                style="width: 100%; height: auto; object-fit: cover;"
                loading="lazy" />
        </div>

        <div class="information flex-grow-1 col-12 col-md-6">
            <h1 class="text-primary mb-3" style="font-weight: 600;">{{ $competition?->name }}</h1>

            <p class="text-muted mb-1">Biaya Pendaftaran: <span style="font-weight: 600;">{{ $competition?->registration_fee_rupiah }}</span></p>
            <p class="text-muted mb-3">Level: {{ $competition?->level?->display_as }}</p>

            <div class="d-flex flex-column flex-sm-row gap-2 w-100">
                <div class="flex-fill">
                    <a href="{{ route('register') }}" class="btn btn-primary fw-semibold rounded-2 w-100">
                        Daftar Kompetisi
                    </a>
                </div>
                <div class="flex-fill">
                    <a href="{{ $competition->poster ?? '#' }}" class="btn btn-outline-secondary fw-semibold rounded-2 w-100" target="_blank">
                        Guidebook
                    </a>
                </div>
            </div>

            <hr class="my-4">

            <div style="line-height: 1.7; color: #333; font-size: 15px;">
                {!! $competition?->description !!}
            </div>
        </div>
    </div>
</x-layouts.frontend>