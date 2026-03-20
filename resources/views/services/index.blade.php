<x-app-layout>
<style>
  @import url('https://fonts.googleapis.com/css2?family=Playfair+Display:wght@700;900&family=DM+Sans:wght@300;400;500;600&display=swap');

  .sv-wrap *, .sv-wrap *::before, .sv-wrap *::after { box-sizing: border-box; }

  .sv-wrap {
    --rose: #f43f72;
    --rose-light: #fce7ef;
    --ink: #1a1018;
    --sand: #faf6f2;
    --sand-dark: #f0e9e1;
    --cream: #fffbf8;
    --green: #16a34a;
    --slate: #64748b;
    --border: #e8ddd6;
    font-family: 'DM Sans', sans-serif;
    background: var(--sand);
    min-height: 100vh;
    padding: 36px 20px 60px;
    position: relative;
  }

  .sv-wrap::before {
    content: '';
    position: fixed;
    inset: 0;
    background:
      radial-gradient(circle at 15% 10%, rgba(244,63,114,0.05) 0%, transparent 50%),
      radial-gradient(circle at 85% 85%, rgba(244,63,114,0.04) 0%, transparent 40%);
    pointer-events: none;
    z-index: 0;
  }

  .sv-inner {
    max-width: 820px;
    margin: 0 auto;
    position: relative;
    z-index: 1;
  }

  /* HEADER */
  .sv-header {
    display: flex;
    justify-content: space-between;
    align-items: flex-end;
    margin-bottom: 28px;
    animation: svFadeUp 0.4s ease both;
  }
  .sv-eyebrow {
    font-size: 10px;
    font-weight: 600;
    letter-spacing: 0.2em;
    text-transform: uppercase;
    color: var(--rose);
    margin-bottom: 4px;
  }
  .sv-title {
    font-family: 'Playfair Display', serif;
    font-size: 26px;
    font-weight: 900;
    color: var(--ink);
    line-height: 1;
  }
  .sv-new-btn {
    display: inline-flex;
    align-items: center;
    gap: 8px;
    background: var(--ink);
    color: white;
    text-decoration: none;
    font-size: 13px;
    font-weight: 600;
    padding: 12px 22px;
    border-radius: 14px;
    box-shadow: 0 4px 16px rgba(26,16,24,0.18);
    transition: transform 0.15s, box-shadow 0.15s;
    letter-spacing: 0.02em;
  }
  .sv-new-btn:hover {
    transform: translateY(-2px);
    box-shadow: 0 8px 24px rgba(26,16,24,0.26);
  }
  .sv-new-btn:active { transform: scale(0.97); }
  .sv-new-btn svg { width: 15px; height: 15px; }

  /* CARD */
  .sv-card {
    background: var(--cream);
    border: 1px solid var(--border);
    border-radius: 20px;
    overflow: hidden;
    animation: svFadeUp 0.4s 0.1s ease both;
  }

  /* TABLE */
  .sv-table { width: 100%; border-collapse: collapse; }

  .sv-table thead tr {
    background: var(--sand-dark);
    border-bottom: 1px solid var(--border);
  }
  .sv-table th {
    padding: 14px 20px;
    font-size: 9px;
    font-weight: 700;
    letter-spacing: 0.18em;
    text-transform: uppercase;
    color: var(--slate);
    text-align: left;
  }
  .sv-table th.center { text-align: center; }

  .sv-table tbody tr {
    border-bottom: 1px solid var(--border);
    transition: background 0.12s;
  }
  .sv-table tbody tr:last-child { border-bottom: none; }
  .sv-table tbody tr:hover { background: var(--sand); }

  .sv-table td {
    padding: 17px 20px;
    vertical-align: middle;
  }

  /* NAME */
  .sv-name {
    font-weight: 600;
    font-size: 14px;
    color: var(--ink);
  }

  /* DURATION */
  .sv-duration {
    display: inline-flex;
    align-items: center;
    gap: 5px;
    font-size: 13px;
    color: var(--slate);
  }
  .sv-duration svg { width: 13px; height: 13px; color: #c0b0bb; }

  /* PRICE */
  .sv-price {
    font-family: 'Playfair Display', serif;
    font-size: 15px;
    font-weight: 700;
    color: var(--green);
    white-space: nowrap;
  }

  /* ACTIONS */
  .sv-actions {
    display: flex;
    justify-content: center;
    align-items: center;
    gap: 8px;
  }

  .sv-edit-btn {
    display: inline-flex;
    align-items: center;
    gap: 5px;
    font-size: 11px;
    font-weight: 600;
    letter-spacing: 0.06em;
    text-transform: uppercase;
    color: var(--slate);
    text-decoration: none;
    padding: 6px 14px;
    border: 1.5px solid var(--border);
    border-radius: 20px;
    background: white;
    transition: border-color 0.15s, color 0.15s, transform 0.1s;
  }
  .sv-edit-btn:hover {
    border-color: var(--ink);
    color: var(--ink);
    transform: scale(1.03);
  }
  .sv-edit-btn svg { width: 12px; height: 12px; }

  .sv-del-btn {
    display: inline-flex;
    align-items: center;
    gap: 5px;
    font-size: 11px;
    font-weight: 600;
    letter-spacing: 0.06em;
    text-transform: uppercase;
    color: #ef4444;
    background: none;
    border: 1.5px solid #fecaca;
    border-radius: 20px;
    padding: 6px 14px;
    cursor: pointer;
    font-family: 'DM Sans', sans-serif;
    transition: background 0.15s, border-color 0.15s, transform 0.1s;
  }
  .sv-del-btn:hover {
    background: #fff1f1;
    border-color: #ef4444;
    transform: scale(1.03);
  }
  .sv-del-btn svg { width: 12px; height: 12px; }

  /* EMPTY */
  .sv-empty {
    text-align: center;
    padding: 48px 20px;
    color: var(--slate);
    font-size: 13px;
    font-style: italic;
  }

  @keyframes svFadeUp {
    from { opacity: 0; transform: translateY(14px); }
    to   { opacity: 1; transform: translateY(0); }
  }

  @media (max-width: 560px) {
    .sv-table thead { display: none; }
    .sv-table tbody tr { display: flex; flex-direction: column; padding: 14px 16px; gap: 4px; }
    .sv-table td { padding: 2px 0; border: none; }
    .sv-actions { justify-content: flex-start; margin-top: 6px; }
  }
</style>

<div class="sv-wrap">
  <div class="sv-inner">

    {{-- HEADER --}}
    <div class="sv-header">
      <div>
        <div class="sv-eyebrow">✦ Configuración</div>
        <h2 class="sv-title">Catálogo de Servicios</h2>
      </div>
      <a href="{{ route('services.create') }}" class="sv-new-btn">
        <svg fill="none" stroke="currentColor" viewBox="0 0 24 24">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M12 4v16m8-8H4"/>
        </svg>
        Nuevo Servicio
      </a>
    </div>

    {{-- TABLE --}}
    <div class="sv-card">
      <table class="sv-table">
        <thead>
          <tr>
            <th>Nombre</th>
            <th>Duración</th>
            <th>Precio</th>
            <th class="center">Acciones</th>
          </tr>
        </thead>
        <tbody>
          @foreach($services as $service)
          <tr>
            <td><span class="sv-name">{{ $service->name }}</span></td>
            <td>
              <span class="sv-duration">
                <svg fill="none" stroke="currentColor" viewBox="0 0 24 24">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                </svg>
                {{ $service->duration_minutes }} min
              </span>
            </td>
            <td><span class="sv-price">L. {{ number_format($service->price, 2) }}</span></td>
            <td>
              <div class="sv-actions">
                <a href="{{ route('services.edit', $service) }}" class="sv-edit-btn">
                  <svg fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/>
                  </svg>
                  Editar
                </a>
                <form action="{{ route('services.destroy', $service) }}" method="POST" onsubmit="return confirm('¿Eliminar este servicio?')">
                  @csrf @method('DELETE')
                  <button type="submit" class="sv-del-btn">
                    <svg fill="none" stroke="currentColor" viewBox="0 0 24 24">
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/>
                    </svg>
                    Eliminar
                  </button>
                </form>
              </div>
            </td>
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>

  </div>
</div>
</x-app-layout>