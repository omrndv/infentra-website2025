<div class="row m-0 p-3" style="background-color: #ED7497; color: white;" style="border-bottom: 2px #000 solid;">
    <h3 class="fw-bold text-center m-0">MEDIA PARTNER</h3>
</div>

<div class="row m-0 align-items-center" style="min-height: 150px;">
    <div class="col-12 text-center text-muted p-4">
        <div class="marquee-wrapper" onmouseover="this.querySelector('marquee').stop();" onmouseout="this.querySelector('marquee').start();">
            <marquee behavior="scroll" direction="left" scrollamount="10" class="marquee-content">
                <div class="d-flex">
                    @foreach ($partners as $partner)
                    <div class="d-inline-block mx-4">
                        <img
                            src="{{ $partner->logo ?? '#' }}"
                            class="partner-logo"
                            alt="{{ $partner->name }}"
                            loading="lazy"
                            style="max-width: 150px; height: auto;" />
                    </div>
                    @endforeach
                </div>
            </marquee>
        </div>
    </div>
</div>