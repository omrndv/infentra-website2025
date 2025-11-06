<x-layouts.frontend title="{{ $appSettings['title'] }}" description="{{ $appSettings['description'] }}">
    <div class="container container-hero mt-5">
        <x-frontend.card.hero />
    </div>
    <div class="container py-5" id="competition">
        <a
            class="d-block display-6 text-center mb-3"
            style="color: black; display: flex; justify-content: center; align-items: center; text-decoration:none; font-weight:700"
            data-aos="fade-up">
            KOMPETISI
        </a>
        <x-frontend.card.competition />
    </div>
    <div class="container py-5">
        <x-frontend.card.information />
    </div>
    <div id="timeline" class="container py-5">
        <x-frontend.timeline />
    </div>
    <div id="sponsor" class="container-fluid py-5">
        <h2 class="text-center text-white mb-5 text-uppercase fw-bold">Sponsor</h2>
        <x-frontend.card.sponsor />
    </div>
    <div id="media-partner" class="container-fluid py-5">
        <h2 class="text-center mb-5 text-uppercase mt-5 fw-bold">Media Partner</h2>
        <x-frontend.card.media-partner />
    </div>
</x-layouts.frontend>