<div class="container card-container-custom text-center my-5">
    <div class="marquee-wrapper" onmouseover="this.querySelector('marquee').stop();" onmouseout="this.querySelector('marquee').start();">
        <marquee behavior="scroll" direction="left" scrollamount="10" class="marquee-content">
            @foreach ($sponsorsTiers as $tier)
            @foreach ($tier->sponsorships as $sponsor)
            @php
            $sizeClass = match (strtolower($tier->tier)) {
            'platinum' => 'sponsor-xl',
            'gold' => 'sponsor-m',
            'silver' => 'sponsor-l',
            'bronze' => 'sponsor-l',
            default => 'sponsor-m'
            };
            @endphp

            <div class="d-inline-block mx-4">
                <img
                    src="{{ $sponsor->logo ?? '#' }}"
                    alt="{{ $sponsor->name }}"
                    class="sponsor-logo {{ $sizeClass }}"
                    loading="lazy" />
            </div>
            @endforeach
            @endforeach
        </marquee>
    </div>
</div>