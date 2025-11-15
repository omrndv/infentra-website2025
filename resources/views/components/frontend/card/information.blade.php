<div class="container-fluid p-0" style="background-color: #f7f7f7;">

    <div class="row m-0 py-3 px-3" style="background-color: #FFB049; color: white; border: 2px solid #000; border-bottom: none;">
        <div class="col-12">
            <h1 class="fw-bold text-center text-md-start" style="font-size: 2rem;">
                {{ sprintf('APA ITU %s?', $appSettings['title']) }}
            </h1>
        </div>
    </div>

    <div class="py-3 px-3" style="border: 2px solid #000; background-color: #FCEFDE;">
        <p style="font-size: 1rem; line-height: 1.6; font-family: 'Plus Jakarta Sans', sans-serif; margin: 0;">
            {{ $appSettings['description'] }}.
        </p>
    </div>

    <x-frontend.timeline />

    <hr style="border: 0; border-top: 2px solid #000; margin: 0;">

    <div class="row py-5" style="background-color: white;">
        <div class="col-12 text-center pt-5">
            <h2 class="fw-bold" style="font-size: 2rem; color:#333;">TUJUAN & MANFAAT</h2>
            <p style="font-weight:300;font-size:1rem;font-family: 'Plus Jakarta Sans', sans-serif;">
                MENUMBUHKAN SEMANGAT KOLABORASI, INOVASI, <br> DAN PRESTASI MAHASISWA INDONESIA
            </p>
        </div>

        <div class="col-12">

            <div class="row g-0" style="border: 1px solid #000; font-family: 'Plus Jakarta Sans', sans-serif;">

                <div class="col-12 col-md-6" style="border: 1px solid #000;">
                    <div style="background-color:#FCEFDE;color:black;padding:25px;">
                        <p class="mb-0" style="font-weight:500;font-size:1rem;">
                            <span style="font-size:1.5rem;margin-right:10px;">&#9733;</span>
                            Menjadi wadah pengembangan minat dan bakat mahasiswa/pelajar.
                        </p>
                    </div>
                </div>

                <div class="col-12 col-md-6" style="border: 1px solid #000;">
                    <div style="background-color:#FFB049;color:white;padding:25px;">
                        <p class="mb-0" style="font-weight:500;font-size:1rem;">
                            <span style="font-size:1.5rem;margin-right:10px;">&#129309;</span>
                            Mendorong inovasi, kebersamaan, dan sportivitas.
                        </p>
                    </div>
                </div>

                <div class="col-12 col-md-6" style="border: 1px solid #000;">
                    <div style="background-color:#FFB049;color:white;padding:25px;">
                        <p class="mb-0" style="font-weight:500;font-size:1rem;">
                            <span style="font-size:1.5rem;margin-right:10px;">&#9889;</span>
                            Menumbuhkan jejaring dan kolaborasi nasional.
                        </p>
                    </div>
                </div>

                <div class="col-12 col-md-6" style="border: 1px solid #000;">
                    <div style="background-color:#FCEFDE;color:black;padding:25px;">
                        <p class="mb-0" style="font-weight:500;font-size:1rem;">
                            <span style="font-size:1.5rem;margin-right:10px;">&#10145;</span>
                            Memberi dampak edukatif dan apresiasi prestasi peserta.
                        </p>
                    </div>
                </div>

            </div>

        </div>
    </div>

</div>