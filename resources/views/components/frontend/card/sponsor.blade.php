<section id="sponsors-partners" class="container-fluid py-5 mt-5">
    <div class="row text-center mb-4">
        <div class="col-12">
            <h2 class="fw-bold" style="font-size: 2.5rem;">SPONSOR & MEDIA PARTNER</h2>
            <p style="font-weight:300;font-size:1rem;font-family: 'Plus Jakarta Sans', sans-serif;">
                TERIMAKASIH KEPADA
            </p>
        </div>
    </div>

    <div class="container-fluid px-0">
        <div class="col-12 px-0">

            <div class="border border-dark" style="border-width: 2px !important;">

                <div class="row m-0 p-3" style="background-color: #2F72B5; color: white;">
                    <h3 class="fw-bold text-center m-0">OUR SPONSOR</h3>
                </div>

                <div class="row m-0 border-top border-dark" style="border-width: 2px !important;">

                    @foreach ($sponsorsTiers as $tier)
                    @foreach ($tier->sponsorships as $sponsor)

                    @php
                    $maxHeight = match (strtolower($tier->tier)) {
                    'platinum' => '150px',
                    'gold' => '120px',
                    'silver' => '100px',
                    'bronze' => '90px',
                    default => '80px'
                    };
                    @endphp

                    <div class="col-6 col-md-4 col-lg-3 p-0">
                        <div class="sponsor-box d-flex justify-content-center align-items-center"
                            style="min-height: 190px; padding: 5px; background-color: #fff;">
                            <img src="{{ $sponsor->logo ?? '#' }}"
                                alt="{{ $sponsor->name }}"
                                class="img-fluid"
                                style="object-fit: contain; max-height: {{ $maxHeight }};">
                        </div>
                    </div>

                    @endforeach
                    @endforeach

                </div>

                <x-frontend.card.media-partner />

            </div>

        </div>
    </div>
</section>