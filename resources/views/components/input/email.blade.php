@php
$name = $attributes->get('name') ?? '';
$class = $attributes->merge([
'class' => 'form-control' . ($errors->has($name) ? ' is-invalid' : '')
])->get('class');
@endphp

<div class="mb-3">
    <label
        class="form-label"
        for="{{ $name }}">
        Email
    </label>
    <input
        class="{{ $class }}"
        type="email"
        id="{{ $name }}"
        name="{{ $name }}"
        value="{{ $attributes->get('value') ?? old($name) }}"
        placeholder="MASUKAN EMAIL"
        style="border: 2px solid #000; border-radius: 12px; padding: 16px 10px; font-size: 12px;" />
    {{-- Display error message if validation fails --}}
    @if ($errors->has($name))
    <div class="invalid-feedback">
        {{ $errors->first($name) }}
    </div>
    @endif
</div>