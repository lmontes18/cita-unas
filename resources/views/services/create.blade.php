<x-app-layout>
<style>
  @import url('https://fonts.googleapis.com/css2?family=Playfair+Display:wght@700;900&family=DM+Sans:wght@300;400;500;600&display=swap');

  .sc-wrap *, .sc-wrap *::before, .sc-wrap *::after { box-sizing: border-box; }

  .sc-wrap {
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

  .sc-wrap::before {
    content: '';
    position: fixed;
    inset: 0;
    background:
      radial-gradient(circle at 10% 10%, rgba(244,63,114,0.06) 0%, transparent 50%),
      radial-gradient(circle at 90% 90%, rgba(244,63,114,0.04) 0%, transparent 40%);
    pointer-events: none;
    z-index: 0;
  }

  .sc-inner {
    max-width: 500px;
    margin: 0 auto;
    position: relative;
    z-index: 1;
  }

  /* HEADER */
  .sc-header {
    margin-bottom: 24px;
    animation: scFadeUp 0.4s ease both;
  }
  .sc-eyebrow {
    font-size: 10px;
    font-weight: 600;
    letter-spacing: 0.2em;
    text-transform: uppercase;
    color: var(--rose);
    margin-bottom: 4px;
  }
  .sc-title {
    font-family: 'Playfair Display', serif;
    font-size: 26px;
    font-weight: 900;
    color: var(--ink);
    line-height: 1;
  }

  /* CARD */
  .sc-card {
    background: var(--cream);
    border: 1px solid var(--border);
    border-radius: 22px;
    padding: 32px;
    box-shadow: 0 4px 32px rgba(26,16,24,0.06);
    animation: scFadeUp 0.4s 0.1s ease both;
  }

  /* FIELD */
  .sc-field { margin-bottom: 20px; }

  .sc-label {
    display: block;
    font-size: 10px;
    font-weight: 700;
    letter-spacing: 0.15em;
    text-transform: uppercase;
    color: var(--slate);
    margin-bottom: 8px;
    padding-left: 2px;
  }

  .sc-input-wrap { position: relative; }

  .sc-input-icon {
    position: absolute;
    left: 14px;
    top: 50%;
    transform: translateY(-50%);
    width: 16px; height: 16px;
    color: #c0b0bb;
    pointer-events: none;
    transition: color 0.15s;
  }

  .sc-input {
    width: 100%;
    padding: 12px 16px 12px 42px;
    border: 1.5px solid var(--border);
    border-radius: 13px;
    font-family: 'DM Sans', sans-serif;
    font-size: 14px;
    color: var(--ink);
    background: white;
    outline: none;
    transition: border-color 0.15s, box-shadow 0.15s;
  }
  .sc-input:focus {
    border-color: var(--rose);
    box-shadow: 0 0 0 3px rgba(244,63,114,0.1);
  }
  .sc-input:focus + .sc-input-icon { color: var(--rose); }
  .sc-input::placeholder { color: #c0b0bb; }

  /* Hint text */
  .sc-hint {
    font-size: 11px;
    color: #c0b0bb;
    margin-top: 5px;
    padding-left: 3px;
  }

  /* DIVIDER */
  .sc-divider {
    border: none;
    border-top: 1px solid var(--border);
    margin: 26px 0 24px;
  }

  /* ACTIONS */
  .sc-actions {
    display: flex;
    justify-content: flex-end;
    gap: 10px;
    align-items: center;
  }

  .sc-cancel {
    font-size: 13px;
    font-weight: 500;
    color: var(--slate);
    text-decoration: none;
    padding: 11px 20px;
    border: 1.5px solid var(--border);
    border-radius: 13px;
    background: white;
    transition: border-color 0.15s, color 0.15s;
  }
  .sc-cancel:hover { border-color: var(--slate); color: var(--ink); }

  .sc-submit {
    display: inline-flex;
    align-items: center;
    gap: 8px;
    padding: 12px 28px;
    background: var(--rose);
    color: white;
    border: none;
    border-radius: 13px;
    font-family: 'DM Sans', sans-serif;
    font-size: 14px;
    font-weight: 600;
    cursor: pointer;
    letter-spacing: 0.02em;
    box-shadow: 0 4px 20px rgba(244,63,114,0.28);
    transition: background 0.15s, transform 0.1s, box-shadow 0.15s;
  }
  .sc-submit:hover {
    background: #e02860;
    box-shadow: 0 6px 28px rgba(244,63,114,0.38);
    transform: translateY(-1px);
  }
  .sc-submit:active { transform: scale(0.97); }
  .sc-submit svg { width: 15px; height: 15px; }

  @keyframes scFadeUp {
    from { opacity: 0; transform: translateY(14px); }
    to   { opacity: 1; transform: translateY(0); }
  }
</style>

<div class="sc-wrap">
  <div class="sc-inner">

    {{-- HEADER --}}
    <div class="sc-header">
      <div class="sc-eyebrow">✦ Catálogo</div>
      <h2 class="sc-title">Nuevo Servicio</h2>
    </div>

    <div class="sc-card">
      <form action="{{ route('services.store') }}" method="POST">
        @csrf

        {{-- Nombre --}}
        <div class="sc-field">
          <label class="sc-label">Nombre del Servicio</label>
          <div class="sc-input-wrap">
            <input type="text" name="name" class="sc-input"
              placeholder="Ej. Retiro de Acrílico" required>
            <svg class="sc-input-icon" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z"/>
            </svg>
          </div>
        </div>

        {{-- Duración --}}
        <div class="sc-field">
          <label class="sc-label">Duración (en minutos)</label>
          <div class="sc-input-wrap">
            <input type="number" name="duration_minutes" class="sc-input"
              placeholder="30" required>
            <svg class="sc-input-icon" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
            </svg>
          </div>
          <p class="sc-hint">En minutos — ej. 30, 45, 60</p>
        </div>

        {{-- Precio --}}
        <div class="sc-field">
          <label class="sc-label">Precio (Lempiras)</label>
          <div class="sc-input-wrap">
            <input type="number" step="0.01" name="price" class="sc-input"
              placeholder="150.00" required>
            <svg class="sc-input-icon" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
            </svg>
          </div>
        </div>

        <hr class="sc-divider">

        {{-- ACTIONS --}}
        <div class="sc-actions">
          <a href="{{ route('services.index') }}" class="sc-cancel">Cancelar</a>
          <button type="submit" class="sc-submit">
            <svg fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M5 13l4 4L19 7"/>
            </svg>
            Guardar Servicio
          </button>
        </div>

      </form>
    </div>

  </div>
</div>
</x-app-layout>