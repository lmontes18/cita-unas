<x-guest-layout>
<style>
  @import url('https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,700;0,900;1,700&family=DM+Sans:wght@300;400;500;600&display=swap');

  .lg-wrap *, .lg-wrap *::before, .lg-wrap *::after { box-sizing: border-box; }

  .lg-wrap {
    --rose: #f43f72;
    --rose-light: #fce7ef;
    --ink: #1a1018;
    --sand: #faf6f2;
    --sand-dark: #f0e9e1;
    --cream: #fffbf8;
    --slate: #64748b;
    --border: #e8ddd6;
    font-family: 'DM Sans', sans-serif;
    min-height: 100vh;
    background: var(--sand);
    display: flex;
    align-items: center;
    justify-content: center;
    padding: 32px 20px;
    position: relative;
    overflow: hidden;
  }

  /* Decorative blobs */
  .lg-wrap::before {
    content: '';
    position: fixed;
    width: 500px; height: 500px;
    border-radius: 50%;
    background: radial-gradient(circle, rgba(244,63,114,0.09) 0%, transparent 70%);
    top: -120px; left: -120px;
    pointer-events: none;
  }
  .lg-wrap::after {
    content: '';
    position: fixed;
    width: 400px; height: 400px;
    border-radius: 50%;
    background: radial-gradient(circle, rgba(244,63,114,0.06) 0%, transparent 70%);
    bottom: -100px; right: -80px;
    pointer-events: none;
  }

  .lg-box {
    width: 100%;
    max-width: 420px;
    position: relative;
    z-index: 1;
    animation: lgFadeUp 0.5s ease both;
  }

  /* BRAND */
  .lg-brand {
    text-align: center;
    margin-bottom: 32px;
  }
  .lg-brand-icon {
    display: inline-flex;
    align-items: center;
    justify-content: center;
    width: 52px; height: 52px;
    background: var(--rose);
    border-radius: 16px;
    margin-bottom: 14px;
    box-shadow: 0 6px 24px rgba(244,63,114,0.32);
  }
  .lg-brand-icon svg { width: 26px; height: 26px; color: white; }
  .lg-brand-eyebrow {
    font-size: 10px;
    font-weight: 600;
    letter-spacing: 0.2em;
    text-transform: uppercase;
    color: var(--rose);
    margin-bottom: 5px;
  }
  .lg-brand-title {
    font-family: 'Playfair Display', serif;
    font-size: 28px;
    font-weight: 900;
    color: var(--ink);
    line-height: 1;
  }
  .lg-brand-sub {
    font-size: 13px;
    color: var(--slate);
    margin-top: 6px;
  }

  /* CARD */
  .lg-card {
    background: var(--cream);
    border: 1px solid var(--border);
    border-radius: 22px;
    padding: 34px 32px;
    box-shadow: 0 4px 40px rgba(26,16,24,0.07);
  }

  /* STATUS */
  .lg-status {
    margin-bottom: 20px;
    padding: 12px 16px;
    background: #f0fdf4;
    border: 1px solid #bbf7d0;
    border-radius: 12px;
    font-size: 13px;
    color: #166534;
  }

  /* FIELD */
  .lg-field { margin-bottom: 20px; }

  .lg-label {
    display: block;
    font-size: 10px;
    font-weight: 700;
    letter-spacing: 0.15em;
    text-transform: uppercase;
    color: var(--slate);
    margin-bottom: 8px;
    padding-left: 2px;
  }

  .lg-input-wrap { position: relative; }

  .lg-input-icon {
    position: absolute;
    left: 14px; top: 50%;
    transform: translateY(-50%);
    width: 16px; height: 16px;
    color: #c0b0bb;
    pointer-events: none;
    transition: color 0.15s;
  }

  /* Override Breeze's x-text-input styles */
  #email, #password {
    width: 100% !important;
    padding: 12px 16px 12px 42px !important;
    border: 1.5px solid var(--border) !important;
    border-radius: 13px !important;
    font-family: 'DM Sans', sans-serif !important;
    font-size: 14px !important;
    color: var(--ink) !important;
    background: white !important;
    outline: none !important;
    box-shadow: none !important;
    transition: border-color 0.15s, box-shadow 0.15s !important;
  }
  #email:focus, #password:focus {
    border-color: var(--rose) !important;
    box-shadow: 0 0 0 3px rgba(244,63,114,0.1) !important;
  }
  #email::placeholder, #password::placeholder { color: #c0b0bb; }

  /* Focus icon color change */
  #email:focus ~ .lg-input-icon,
  #password:focus ~ .lg-input-icon { color: var(--rose); }

  /* Error messages */
  .lg-field .text-sm.text-red-600,
  .lg-field p {
    font-size: 11px !important;
    color: #ef4444 !important;
    margin-top: 6px !important;
    padding-left: 2px;
  }

  /* REMEMBER */
  .lg-remember {
    display: flex;
    align-items: center;
    gap: 10px;
    margin-bottom: 24px;
  }
  .lg-remember input[type="checkbox"] {
    width: 17px; height: 17px;
    border-radius: 5px;
    border: 1.5px solid var(--border);
    appearance: none;
    -webkit-appearance: none;
    background: white;
    cursor: pointer;
    flex-shrink: 0;
    position: relative;
    transition: background 0.15s, border-color 0.15s;
  }
  .lg-remember input[type="checkbox"]:checked {
    background: var(--rose);
    border-color: var(--rose);
  }
  .lg-remember input[type="checkbox"]:checked::after {
    content: '';
    position: absolute;
    left: 4px; top: 1px;
    width: 6px; height: 10px;
    border: 2px solid white;
    border-top: none;
    border-left: none;
    transform: rotate(45deg);
  }
  .lg-remember-text {
    font-size: 13px;
    color: var(--slate);
    cursor: pointer;
    user-select: none;
  }

  /* SUBMIT */
  .lg-submit {
    width: 100%;
    padding: 14px;
    background: var(--rose);
    color: white;
    border: none;
    border-radius: 14px;
    font-family: 'DM Sans', sans-serif;
    font-size: 15px;
    font-weight: 600;
    cursor: pointer;
    letter-spacing: 0.03em;
    box-shadow: 0 4px 24px rgba(244,63,114,0.3);
    transition: background 0.15s, transform 0.1s, box-shadow 0.15s;
    margin-bottom: 18px;
  }
  .lg-submit:hover {
    background: #e02860;
    box-shadow: 0 6px 32px rgba(244,63,114,0.4);
    transform: translateY(-1px);
  }
  .lg-submit:active { transform: scale(0.98); }

  /* FORGOT */
  .lg-forgot {
    display: block;
    text-align: center;
    font-size: 12px;
    color: var(--slate);
    text-decoration: none;
    transition: color 0.15s;
  }
  .lg-forgot:hover { color: var(--rose); }

  /* ANIMATION */
  @keyframes lgFadeUp {
    from { opacity: 0; transform: translateY(20px); }
    to   { opacity: 1; transform: translateY(0); }
  }
</style>

<div class="lg-wrap">
  <div class="lg-box">

    {{-- BRAND --}}
    <div class="lg-brand">
      <div class="lg-brand-icon">
        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="#fff" d="m10.6 20.6l-6.3-6.225q-.55-.55-.6-1.325t.45-1.375l3.25-3.95q.275-.35.687-.537T8.95 7h6.1q.45 0 .863.188t.687.537l3.25 3.95q.5.6.45 1.375t-.6 1.325L13.4 20.6q-.575.575-1.4.575t-1.4-.575M3.175 4.175q.3-.3.7-.3t.7.3l.725.7q.3.3.3.713t-.3.712t-.712.3t-.713-.3l-.7-.725q-.3-.3-.3-.7t.3-.7m9.538-1.887Q13 2.575 13 3v1q0 .425-.288.713T12 5t-.712-.288T11 4V3q0-.425.288-.712T12 2t.713.288M20.8 4.175q.3.3.288.7t-.313.7l-.7.725q-.3.3-.7.3t-.7-.3t-.3-.712t.3-.713l.7-.7q.3-.3.713-.3t.712.3M6.75 14L12 19.2l5.25-5.2zm-.275-2h11.05L15.05 9h-6.1z"/></svg>
      </div>
      <div class="lg-brand-eyebrow">✦ ZOE NAIL´S</div>
      <h1 class="lg-brand-title">Bienvenida</h1>
      <p class="lg-brand-sub">Inicia sesión para continuar</p>
    </div>

    {{-- CARD --}}
    <div class="lg-card">

      {{-- Session Status --}}
      <x-auth-session-status class="lg-status" :status="session('status')" />

      <form method="POST" action="{{ route('login') }}">
        @csrf

        {{-- Email --}}
        <div class="lg-field">
          <x-input-label for="email" class="lg-label" :value="__('Correo electrónico')" />
          <div class="lg-input-wrap">
            <x-text-input id="email" type="email" name="email"
              :value="old('email')" required autofocus autocomplete="username" />
            <svg class="lg-input-icon" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
            </svg>
          </div>
          <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        {{-- Password --}}
        <div class="lg-field">
          <x-input-label for="password" class="lg-label" :value="__('Contraseña')" />
          <div class="lg-input-wrap">
            <x-text-input id="password" type="password" name="password"
              required autocomplete="current-password" />
            <svg class="lg-input-icon" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"/>
            </svg>
          </div>
          <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        {{-- Remember Me --}}
        <div class="lg-remember">
          <input id="remember_me" type="checkbox" name="remember">
          <label for="remember_me" class="lg-remember-text">{{ __('Recordarme') }}</label>
        </div>

        {{-- Submit --}}
        <button type="submit" class="lg-submit">
          {{ __('Iniciar Sesión') }}
        </button>
      

        {{-- Forgot password --}}
        @if (Route::has('password.request'))
          <a class="lg-forgot" href="{{ route('password.request') }}">
            {{ __('¿Olvidaste tu contraseña?') }}
          </a>
        @endif

      </form>
    </div>

  </div>
</div>
</x-guest-layout>