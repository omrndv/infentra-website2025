<button type="{{ $attributes->get('type', 'button') }}" {{ $attributes->merge(['class' => 'btn btn-primary']) }}
    id="{{ $attributes->get('id') }}"
    style="border: 3px solid #000; border-right: 6px solid #000; border-bottom: 6px solid #000; background-color: #076FB8; color: #fff; border-radius: 12px; padding: 14px 20px; font-size: 16px;">
    {{ $slot }}
</button>