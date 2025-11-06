<button type="{{ $attributes->get('type', 'button') }}" {{ $attributes->merge(['class' => 'btn btn-outline-primary']) }}
    style="border: 3px solid #000; background-color: transparent; color: #000; border-radius: 12px; padding: 14px 20px; font-size: 16px;">
    {{ $slot }}
</button>