<div class="row justify-content-center mb-5">
    @foreach ($competitions as $competition)
    <div class="col-12 col-md-6 col-lg-4 mt-4">
        <div class="card card-competition bg-light">
            <div class="position-relative">
                <img
                    src="{{ $competition->poster ?? '#' }}"
                    class="card-img-top p-3"
                    alt="{{ $competition->name }}"
                    loading="lazy" />
                <div class="position-absolute top-0 end-0 p-3">
                    <span class="badge badge-competition text-black bg-light">
                        {{ $competition->level->display_as }}
                    </span>
                </div>
            </div>
            <div class="card-body">
                <h5 class="card-title">
                    {{ $competition->name }}
                </h5>
                <p class="card-text">
                    Biaya Pendaftaran: {{ $competition->registration_fee_rupiah }}
                </p>
                <a
                    href="{{ route('frontend.competition.show', $competition->slug) }}"
                    class="btn btn-primary btn-block card-button">
                    Lihat Detail
                </a>
            </div>
        </div>
    </div>
    @endforeach
</div>