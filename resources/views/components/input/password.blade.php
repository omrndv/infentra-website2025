<div class="mb-3">
  <label for="{{ $attributes->get('name') }}" class="form-label">
    {{ $attributes->get('label') }}
  </label>

  <div class="position-relative">
    <input
      id="passwordField"
      type="{{ $type ?? 'password' }}"
      name="{{ $attributes->get('name') }}"
      value="{{ $attributes->get('value') }}"
      placeholder="MASUKAN PASSWORD"
      {{ $attributes->merge(['class' => 'form-control w-100' . ($errors->has($attributes->get('name')) ? ' is-invalid' : '')]) }}
      style="border:2px solid #000;border-radius:12px;padding:16px 44px 16px 12px;font-size:12px;"
    >

    <button
      type="button"
      id="togglePassword"
      class="position-absolute top-50 end-0 translate-middle-y me-2 p-0 bg-transparent border-0"
      style="line-height:0; z-index:3;"
      aria-label="Tampil/Sembunyikan password"
      tabindex="-1"
    >
  
      <svg id="icon-eye" xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.75">
        <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 12c2.3-4.5 6-7 9.75-7s7.45 2.5 9.75 7c-2.3 4.5-6 7-9.75 7s-7.45-2.5-9.75-7z"/>
        <circle cx="12" cy="12" r="3"/>
      </svg>

      <svg id="icon-eye-off" class="d-none" xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.75">
        <path stroke-linecap="round" stroke-linejoin="round" d="M3 3l18 18M6.11 6.11C4.4 7.35 2.96 9.05 2.25 12c2.3 4.5 6 7 9.75 7 2.06 0 3.97-.6 5.6-1.65M9.88 9.88A3 3 0 0 0 15 15"/>
        <path stroke-linecap="round" stroke-linejoin="round" d="M12 5c3.75 0 7.45 2.5 9.75 7a12.77 12.77 0 0 1-2.05 2.92M12 9a3 3 0 0 1 3 3"/>
      </svg>
    </button>
  </div>

  @if ($errors->has($attributes->get('name')))
    <div class="invalid-feedback">
      {{ $errors->first($attributes->get('name')) }}
    </div>
  @endif
</div>

<script>
  (function () {
    const field = document.getElementById('passwordField');
    const btn = document.getElementById('togglePassword');
    const eye = document.getElementById('icon-eye');
    const eyeOff = document.getElementById('icon-eye-off');

    btn.addEventListener('click', function () {
      const show = field.type === 'password';
      field.type = show ? 'text' : 'password';
      eye.classList.toggle('d-none', show);
      eyeOff.classList.toggle('d-none', !show);
    });
  })();
</script>