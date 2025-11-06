<div class="container card-container-custom overflow-hidden">
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