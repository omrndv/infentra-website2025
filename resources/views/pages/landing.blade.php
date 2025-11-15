<x-layouts.frontend title="{{ $appSettings['title'] }}" description="{{ $appSettings['description'] }}">
    <div class="container mt-5">
        <x-frontend.card.hero />
    </div>
    <div class="container py-5">
        <x-frontend.card.information />
    </div>
    <div class="container mt-2">
        <x-frontend.card.competition />
    </div>
    <div id="sponsor" class="container">
        <x-frontend.card.sponsor />
    </div>
</x-layouts.frontend>