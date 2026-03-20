<x-app-layout>
<style>
  @import url('https://fonts.googleapis.com/css2?family=Playfair+Display:wght@700;900&family=DM+Sans:wght@300;400;500;600&display=swap');

  .nu-wrap *, .nu-wrap *::before, .nu-wrap *::after { box-sizing: border-box; }

  .nu-wrap {
    --rose: #f43f72;
    --rose-light: #fce7ef;
    --ink: #1a1018;
    --sand: #faf6f2;
    --sand-dark: #f0e9e1;
    --cream: #fffbf8;
    --slate: #64748b;
    --border: #e8ddd6;
    font-family: 'DM Sans', sans-serif;
    background: var(--sand);
    min-height: 100vh;
    padding: 40px 20px 60px;
    position: relative;
  }

  .nu-wrap::before {
    content: '';
    position: fixed;
    inset: 0;
    background:
      radial-gradient(circle at 12% 10%, rgba(244,63,114,0.07) 0%, transparent 50%),
      radial-gradient(circle at 88% 90%, rgba(244,63,114,0.05) 0%, transparent 40%);
    pointer-events: none;
    z-index: 0;
  }

  .nu-inner {
    max-width: 460px;
    margin: 0 auto;
    position: relative;
    z-index: 1;
  }

  /* HEADER */
  .nu-header {
    text-align: center;
    margin-bottom: 26px;
    animation: nuFadeUp 0.4s ease both;
  }
  .nu-icon {
    display: inline-flex;
    align-items: center;
    justify-content: center;
    width: 50px; height: 50px;
    background: var(--ink);
    border-radius: 15px;
    margin-bottom: 14px;
    box-shadow: 0 4px 18px rgba(26,16,24,0.2);
  }
  .nu-icon svg { width: 24px; height: 24px; color: white; }
  .nu-eyebrow {
    font-size: 10px;
    font-weight: 600;
    letter-spacing: 0.2em;
    text-transform: uppercase;
    color: var(--rose);
    margin-bottom: 5px;
  }
  .nu-title {
    font-family: 'Playfair Display', serif;
    font-size: 26px;
    font-weight: 900;
    color: var(--ink);
    line-height: 1;
    margin-bottom: 6px;
  }
  .nu-subtitle {
    font-size: 13px;
    color: var(--slate);
  }

  /* CARD */
  .nu-card {
    background: var(--cream);
    border: 1px solid var(--border);
    border-radius: 22px;
    padding: 32px;
    box-shadow: 0 4px 32px rgba(26,16,24,0.06);
    animation: nuFadeUp 0.4s 0.1s ease both;
  }

  /* FIELD */
  .nu-field { margin-bottom: 18px; }

  .nu-label {
    display: block;
    font-size: 10px;
    font-weight: 700;
    letter-spacing: 0.15em;
    text-transform: uppercase;
    color: var(--slate);
    margin-bottom: 8px;
    padding-left: 2px;
  }

  .nu-input-wrap { position: relative; }

  .nu-icon-field {
    position: absolute;
    left: 14px;
    top: 50%;
    transform: translateY(-50%);
    width: 16px; height: 16px;
    color: #c0b0bb;
    pointer-events: none;
    transition: color 0.15s;
    z-index: 1;
  }

  /* Override Breeze x-text-input */
  #name, #email, #password, #password_confirmation {
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
  #name:focus, #email:focus,
  #password:focus, #password_confirmation:focus {
    border-color: var(--rose) !important;
    box-shadow: 0 0 0 3px rgba(244,63,114,0.1) !important;
  }

  /* Error messages */
  .nu-field .text-sm,
  .nu-field p {
    font-size: 11px !important;
    color: #ef4444 !important;
    margin-top: 6px !important;
    padding-left: 3px;
  }

  /* DIVIDER */
  .nu-divider {
    border: none;
    border-top: 1px solid var(--border);
    margin: 24px 0 20px;
  }

  /* SUBMIT */
  .nu-submit {
    width: 100%;
    padding: 14px;
    background: var(--ink);
    color: white;
    border: none;
    border-radius: 14px;
    font-family: 'DM Sans', sans-serif;
    font-size: 15px;
    font-weight: 600;
    cursor: pointer;
    letter-spacing: 0.02em;
    box-shadow: 0 4px 20px rgba(26,16,24,0.2);
    transition: background 0.15s, transform 0.1s, box-shadow 0.15s;
    display: flex;
    align-items: center;
    justify-content: center;
    gap: 8px;
  }
  .nu-submit:hover {
    background: #2d1e28;
    box-shadow: 0 6px 28px rgba(26,16,24,0.3);
    transform: translateY(-1px);
  }
  .nu-submit:active { transform: scale(0.98); }
  .nu-submit svg { width: 16px; height: 16px; }

  @keyframes nuFadeUp {
    from { opacity: 0; transform: translateY(14px); }
    to   { opacity: 1; transform: translateY(0); }
  }
</style>

<div class="nu-wrap">
  <div class="nu-inner">

    {{-- HEADER --}}
    <div class="nu-header">
      <div class="nu-icon">
        <svg fill="none" stroke="currentColor" viewBox="0 0 24 24">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
            d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
        </svg>
      </div>
      <div class="nu-eyebrow">✦ Acceso</div>
      <h2 class="nu-title">Nuevo Usuario</h2>
      <p class="nu-subtitle">Registra una nueva cuenta de acceso</p>
    </div>

    {{-- CARD --}}
    <div class="nu-card">
      <form method="POST" action="{{ route('users.store') }}">
        @csrf

        {{-- Nombre --}}
        <div class="nu-field">
          <label class="nu-label" for="name">Nombre Completo</label>
          <div class="nu-input-wrap">
            <x-text-input id="name" type="text" name="name"
              :value="old('name')" required autofocus />
            <svg class="nu-icon-field" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
            </svg>
          </div>
          <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>

        {{-- Email --}}
        <div class="nu-field">
          <label class="nu-label" for="email">Correo Electrónico</label>
          <div class="nu-input-wrap">
            <x-text-input id="email" type="email" name="email"
              :value="old('email')" required />
            <svg class="nu-icon-field" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
            </svg>
          </div>
          <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <hr class="nu-divider">

        {{-- Password --}}
        <div class="nu-field">
          <label class="nu-label" for="password">Contraseña</label>
          <div class="nu-input-wrap">
            <x-text-input id="password" type="password" name="password" required />
            <svg class="nu-icon-field" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"/>
            </svg>
          </div>
          <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        {{-- Confirm Password --}}
        <div class="nu-field" style="margin-bottom:0">
          <label class="nu-label" for="password_confirmation">Confirmar Contraseña</label>
          <div class="nu-input-wrap">
            <x-text-input id="password_confirmation" type="password"
              name="password_confirmation" required />
            <svg class="nu-icon-field" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"/>
            </svg>
          </div>
        </div>

        <hr class="nu-divider">

        {{-- Submit --}}
        <button type="submit" class="nu-submit">
          <svg fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M5 13l4 4L19 7"/>
          </svg>
          Crear Cuenta
        </button>

      </form>
    </div>

  </div>
</div>
</x-app-layout>