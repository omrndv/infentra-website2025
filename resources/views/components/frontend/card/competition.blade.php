<div class="container">
    <div class="row text-center">
        <div class="col-12">
            <h2 style="font-weight: 900; font-size: 2.5rem;">LOMBA</h2>
            <p style="font-weight: 300; font-size: 1.1rem; color: #000; font-family: 'Plus Jakarta Sans', sans-serif;">
                Tunjukkan kemampuanmu di tiga kompetisi <br> seru: CTF, Mobile Legends, dan PES!
            </p>
        </div>
    </div>

    <div class="row justify-content-center">
        @foreach ($competitions as $competition)
        <div class="col-md-4 mb-4 d-flex">
            <div class="card h-100 d-flex flex-column" style="border: 2px solid #000; border-radius: 10px;">

                <div class="card-img-container"
                    style="background-color: #FCEFDE; padding: 20px; display: flex; justify-content: center; align-items: center;">
                    <img src="{{ $competition->poster ?? asset('images/logo.png') }}"
                        class="card-img-top"
                        alt="{{ $competition->name }}"
                        style="max-width: 100%; max-height: 100%; object-fit: contain;">
                </div>

                <div class="card-body flex-grow-1"
                    style="background-color: #FCEFDE; text-align: left;">
                    <h5 class="card-title" style="font-weight: 600;">
                        {{ $competition->emoji ?? '🎯' }} {{ strtoupper($competition->name) }}
                    </h5>

                    <p class="card-text"
                        style="font-size: 0.9rem; color: #333; font-family:'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;">
                        {{ $competition->short_description ?? 'Kompetisi seru untuk menunjukkan kemampuanmu!' }}
                    </p>
                </div>

                <div class="p-3 mt-auto" style="background-color: #FCEFDE;">
                    <a href="{{ route('register', $competition->slug) }}"
                        class="btn"
                        style="background-color: #ED7497; color:white; font-weight:bold; border: 2px solid #000; border-radius:0;">
                        DAFTAR SEKARANG
                    </a>

                    <a href="{{ route('frontend.competition.show', $competition->slug) }}"
                        class="btn text-left ms-2"
                        style="font-weight:bold; background-color:white; border: 2px solid #000; border-radius:0;">
                        DETAIL
                    </a>
                </div>

            </div>
        </div>
        @endforeach
    </div>
</div>