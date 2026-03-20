<x-app-layout>
<style>
  @import url('https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,700;0,900;1,700&family=DM+Sans:wght@300;400;500;600&display=swap');

  .ns-wrap *, .ns-wrap *::before, .ns-wrap *::after { box-sizing: border-box; }

  .ns-wrap {
    --rose: #f43f72;
    --rose-light: #fce7ef;
    --ink: #1a1018;
    --sand: #faf6f2;
    --sand-dark: #f0e9e1;
    --cream: #fffbf8;
    --green: #22c55e;
    --slate: #64748b;
    --border: #e8ddd6;
    font-family: 'DM Sans', sans-serif;
    background: var(--sand);
    min-height: 100vh;
    padding: 32px 20px 60px;
    position: relative;
  }

  .ns-wrap::before {
    content: '';
    position: fixed;
    inset: 0;
    background:
      radial-gradient(circle at 20% 10%, rgba(244,63,114,0.06) 0%, transparent 50%),
      radial-gradient(circle at 80% 80%, rgba(244,63,114,0.04) 0%, transparent 40%);
    pointer-events: none;
    z-index: 0;
  }

  .ns-inner {
    max-width: 780px;
    margin: 0 auto;
    position: relative;
    z-index: 1;
  }

  /* HEADER */
  .ns-header {
    display: flex;
    justify-content: space-between;
    align-items: flex-end;
    margin-bottom: 36px;
    animation: nsFadeUp 0.5s ease both;
  }
  .ns-brand-eyebrow {
    font-size: 10px;
    font-weight: 600;
    letter-spacing: 0.2em;
    text-transform: uppercase;
    color: var(--rose);
    margin-bottom: 3px;
  }
  .ns-brand-title {
    font-family: 'Playfair Display', serif;
    font-size: 28px;
    font-weight: 900;
    color: var(--ink);
    line-height: 1;
  }
  .ns-date-day {
    font-family: 'Playfair Display', serif;
    font-size: 36px;
    font-weight: 700;
    color: var(--rose);
    line-height: 1;
    text-align: right;
  }
  .ns-date-sub {
    font-size: 11px;
    font-weight: 500;
    color: var(--slate);
    letter-spacing: 0.1em;
    text-transform: uppercase;
    text-align: right;
  }

  /* ACTIONS */
  .ns-actions {
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 12px;
    margin-bottom: 28px;
    animation: nsFadeUp 0.5s 0.08s ease both;
  }
  .ns-btn {
    display: flex;
    align-items: center;
    justify-content: center;
    gap: 10px;
    padding: 18px 24px;
    border-radius: 16px;
    text-decoration: none;
    font-weight: 600;
    font-size: 14px;
    letter-spacing: 0.02em;
    transition: transform 0.15s ease, box-shadow 0.15s ease;
    color: white;
  }
  .ns-btn:active { transform: scale(0.97); }
  .ns-btn-rose {
    background: var(--rose);
    box-shadow: 0 4px 24px rgba(244,63,114,0.3);
  }
  .ns-btn-rose:hover { box-shadow: 0 8px 32px rgba(244,63,114,0.4); transform: translateY(-1px); }
  .ns-btn-ink {
    background: var(--ink);
    box-shadow: 0 4px 16px rgba(26,16,24,0.18);
  }
  .ns-btn-ink:hover { box-shadow: 0 8px 24px rgba(26,16,24,0.28); transform: translateY(-1px); }
  .ns-btn svg { width: 20px; height: 20px; flex-shrink: 0; }

  /* STATS */
  .ns-stats {
    display: grid;
    grid-template-columns: repeat(3, 1fr);
    gap: 12px;
    margin-bottom: 28px;
    animation: nsFadeUp 0.5s 0.16s ease both;
  }
  .ns-stat {
    background: var(--cream);
    border: 1px solid var(--border);
    border-radius: 18px;
    padding: 20px 18px;
    position: relative;
    overflow: hidden;
    transition: transform 0.15s ease;
  }
  .ns-stat:hover { transform: translateY(-2px); }
  .ns-stat::after {
    content: '';
    position: absolute;
    bottom: 0; left: 0; right: 0;
    height: 3px;
    border-radius: 0 0 18px 18px;
  }
  .ns-stat-green::after { background: #22c55e; }
  .ns-stat-red::after { background: #ef4444; }
  .ns-stat-rose::after { background: var(--rose); }
  .ns-stat-label {
    font-size: 9px;
    font-weight: 600;
    letter-spacing: 0.15em;
    text-transform: uppercase;
    color: var(--slate);
    margin-bottom: 10px;
  }
  .ns-stat-value {
    font-family: 'Playfair Display', serif;
    font-size: 22px;
    font-weight: 700;
    color: var(--ink);
    line-height: 1;
  }
  .ns-stat-cur {
    font-size: 12px;
    font-weight: 400;
    font-family: 'DM Sans', sans-serif;
    color: var(--slate);
    margin-right: 2px;
  }

  /* EXPENSE CARD */
  .ns-card {
    background: var(--cream);
    border: 1px solid var(--border);
    border-radius: 20px;
    padding: 24px;
    margin-bottom: 28px;
  }
  .ns-card-expenses { animation: nsFadeUp 0.5s 0.24s ease both; }
  .ns-card-appts { animation: nsFadeUp 0.5s 0.32s ease both; }

  .ns-section-title {
    font-family: 'Playfair Display', serif;
    font-size: 17px;
    font-weight: 700;
    color: var(--ink);
    margin-bottom: 18px;
    display: flex;
    align-items: center;
    gap: 8px;
  }
  .ns-dot {
    width: 8px; height: 8px;
    background: var(--rose);
    border-radius: 50%;
    flex-shrink: 0;
  }

  .ns-expense-grid {
    display: grid;
    grid-template-columns: 2fr 1fr 1fr auto;
    gap: 10px;
    align-items: end;
  }
  .ns-field { display: flex; flex-direction: column; gap: 5px; }
  .ns-field-label {
    font-size: 10px;
    font-weight: 600;
    letter-spacing: 0.1em;
    text-transform: uppercase;
    color: var(--slate);
    padding-left: 2px;
  }
  .ns-input {
    width: 100%;
    padding: 11px 14px;
    border: 1.5px solid var(--border);
    border-radius: 12px;
    font-family: 'DM Sans', sans-serif;
    font-size: 14px;
    color: var(--ink);
    background: white;
    outline: none;
    transition: border-color 0.15s, box-shadow 0.15s;
  }
  .ns-input:focus {
    border-color: var(--rose);
    box-shadow: 0 0 0 3px rgba(244,63,114,0.1);
  }
  .ns-input::placeholder { color: #c0b0bb; }
  .ns-save-btn {
    padding: 11px 20px;
    background: var(--rose);
    color: white;
    border: none;
    border-radius: 12px;
    font-family: 'DM Sans', sans-serif;
    font-size: 13px;
    font-weight: 600;
    cursor: pointer;
    white-space: nowrap;
    box-shadow: 0 3px 12px rgba(244,63,114,0.25);
    transition: background 0.15s, transform 0.1s, box-shadow 0.15s;
  }
  .ns-save-btn:hover { background: #e02860; box-shadow: 0 5px 20px rgba(244,63,114,0.35); transform: translateY(-1px); }
  .ns-save-btn:active { transform: scale(0.97); }

  /* APPOINTMENTS */
  .ns-appts-header {
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-bottom: 20px;
  }
  .ns-appts-header .ns-section-title { margin-bottom: 0; }
  .ns-appt-date {
    font-size: 11px;
    font-weight: 700;
    color: var(--slate);
    letter-spacing: 0.08em;
    text-transform: uppercase;
    background: var(--sand-dark);
    padding: 4px 12px;
    border-radius: 20px;
  }

  .ns-empty {
    text-align: center;
    padding: 40px 20px;
    border: 2px dashed var(--border);
    border-radius: 14px;
  }
  .ns-empty p { font-size: 13px; color: var(--slate); font-style: italic; }

  .ns-appt-list { display: flex; flex-direction: column; gap: 10px; }

  .ns-appt {
    display: flex;
    align-items: center;
    justify-content: space-between;
    padding: 16px 18px;
    background: var(--sand);
    border: 1px solid var(--border);
    border-radius: 14px;
    transition: transform 0.12s ease, box-shadow 0.12s ease;
  }
  .ns-appt:hover {
    transform: translateX(3px);
    box-shadow: -3px 0 0 var(--rose), 0 2px 12px rgba(0,0,0,0.06);
  }
  .ns-appt-left { display: flex; align-items: center; gap: 14px; }
  .ns-appt-time {
    background: white;
    border: 1px solid var(--border);
    border-radius: 10px;
    padding: 8px 10px;
    text-align: center;
    min-width: 62px;
    box-shadow: 0 1px 4px rgba(0,0,0,0.05);
  }
  .ns-appt-hour {
    display: block;
    font-family: 'Playfair Display', serif;
    font-size: 16px;
    font-weight: 700;
    color: var(--rose);
    line-height: 1;
  }
  .ns-appt-ampm {
    display: block;
    font-size: 9px;
    font-weight: 700;
    letter-spacing: 0.1em;
    text-transform: uppercase;
    color: var(--slate);
    margin-top: 2px;
  }
  .ns-appt-name { font-weight: 600; font-size: 14px; color: var(--ink); margin-bottom: 2px; }
  .ns-appt-services { font-size: 11px; color: var(--slate); }
  .ns-appt-right { display: flex; flex-direction: column; align-items: flex-end; gap: 8px; }
  .ns-appt-price {
    font-family: 'Playfair Display', serif;
    font-size: 15px;
    font-weight: 700;
    color: var(--ink);
  }
  .ns-btn-complete {
    font-size: 10px;
    font-weight: 700;
    letter-spacing: 0.1em;
    text-transform: uppercase;
    background: var(--green);
    color: white;
    border: none;
    padding: 5px 12px;
    border-radius: 20px;
    cursor: pointer;
    box-shadow: 0 2px 8px rgba(34,197,94,0.25);
    transition: background 0.15s, transform 0.1s;
  }
  .ns-btn-complete:hover { background: #16a34a; }
  .ns-btn-complete:active { transform: scale(0.95); }
  .ns-badge-done {
    font-size: 10px;
    font-weight: 700;
    letter-spacing: 0.1em;
    text-transform: uppercase;
    background: var(--sand-dark);
    color: var(--slate);
    padding: 5px 12px;
    border-radius: 20px;
  }

  @keyframes nsFadeUp {
    from { opacity: 0; transform: translateY(14px); }
    to   { opacity: 1; transform: translateY(0); }
  }

  @media (max-width: 600px) {
    .ns-stats { grid-template-columns: 1fr 1fr; }
    .ns-stats .ns-stat:last-child { grid-column: span 2; }
    .ns-expense-grid { grid-template-columns: 1fr 1fr; }
    .ns-expense-grid .ns-save-btn { grid-column: span 2; width: 100%; }
    .ns-brand-title { font-size: 22px; }
  }
</style>

<div class="ns-wrap">
  <div class="ns-inner">

    {{-- HEADER --}}
    <div class="ns-header">
      <div>
        <div class="ns-brand-eyebrow">✦ Panel de Control</div>
        <h1 class="ns-brand-title">ZOE´S NAIL</h1>
      </div>
      <div>
        <div class="ns-date-day">{{ date('d') }}</div>
        <div class="ns-date-sub">{{ date('M · Y') }}</div>
      </div>
    </div>

    {{-- QUICK ACTIONS --}}
    <div class="ns-actions">
      <a href="{{ route('appointments.create') }}" class="ns-btn ns-btn-rose">
        <svg fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M12 4v16m8-8H4"/></svg>
        Nueva Cita
      </a>
      <a href="{{ route('appointments.calendar') }}" class="ns-btn ns-btn-ink">
        <svg fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>
        Ver Agenda
      </a>
    </div>

    {{-- STATS --}}
    <div class="ns-stats">
      <div class="ns-stat ns-stat-green">
        <div class="ns-stat-label">Ingresos · Semana</div>
        <div class="ns-stat-value"><span class="ns-stat-cur">L.</span>{{ number_format($ingresos, 2) }}</div>
      </div>
      <div class="ns-stat ns-stat-red">
        <div class="ns-stat-label">Gastos · Semana</div>
        <div class="ns-stat-value"><span class="ns-stat-cur">L.</span>{{ number_format($gastos, 2) }}</div>
      </div>
      <div class="ns-stat ns-stat-rose">
        <div class="ns-stat-label">Balance Neto</div>
        <div class="ns-stat-value"><span class="ns-stat-cur">L.</span>{{ number_format($balance, 2) }}</div>
      </div>
    </div>

    {{-- EXPENSE FORM --}}
    <div class="ns-card ns-card-expenses">
      <div class="ns-section-title">
        <span class="ns-dot"></span>
        Registrar Nuevo Gasto
      </div>
      <form action="{{ route('expenses.store') }}" method="POST" class="ns-expense-grid">
        @csrf
        <div class="ns-field">
          <label class="ns-field-label">Descripción</label>
          <input type="text" name="description" placeholder="Ej. Esmaltes, materiales…" class="ns-input" required>
        </div>
        <div class="ns-field">
          <label class="ns-field-label">Monto (L.)</label>
          <input type="number" step="0.01" name="amount" placeholder="0.00" class="ns-input" required>
        </div>
        <div class="ns-field">
          <label class="ns-field-label">Fecha</label>
          <input type="date" name="date" value="{{ date('Y-m-d') }}" class="ns-input" required>
        </div>
        <button type="submit" class="ns-save-btn">Guardar</button>
        <a href="{{ route('expenses.index') }}" class="ns-btn ns-btn-rose">
       <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" viewBox="0 0 24 24"><g fill="#fff" fill-rule="evenodd" clip-rule="evenodd"><path d="M15.735 4.011c.405-.914.74-1.858 1.001-2.823c.33.132.605.372.781.681q.19.32.32.67q.13.356.19.731q.134.796.14 1.602c0 1.28-.18 2.472-.2 3.883a.36.36 0 0 0 .34.36a.35.35 0 0 0 .351-.34c.05-1.421.26-2.612.29-3.903a10.4 10.4 0 0 0-.11-1.732a5.6 5.6 0 0 0-.2-.88a5.6 5.6 0 0 0-.37-.821A2.46 2.46 0 0 0 17.267.438a4.3 4.3 0 0 0-1.912-.35L9.319.007a11 11 0 0 0-2.312.16a3.65 3.65 0 0 0-1.641.69a2.1 2.1 0 0 0-.64 1.001c-.125.48-.182.975-.171 1.471c0 .941-.21 4.384-.34 7.547c-.09 2.062-.14 4.004-.17 5.055a14 14 0 0 0 .22 3.183a2.8 2.8 0 0 0 .74 1.391c.377.275.826.432 1.292.45q1.314.105 2.632.07h2.082c.5 0 1 0 1.401-.06a.3.3 0 1 0 0-.6h-1.371l-2.062-.06c-.51 0-1.431 0-2.242-.07a2.3 2.3 0 0 1-1.181-.31a2.45 2.45 0 0 1-.47-1.382a14 14 0 0 1-.08-2.522c.07-1.481.3-4.704.46-7.557c.13-2.302.22-4.364.23-5.065q-.003-.504.08-1c.032-.244.145-.47.32-.641c.3-.21.641-.35 1.001-.41c.07.46.26 1.27.43 1.911c.09.377.236.737.431 1.071c.376.208.786.347 1.211.41c.801.17 1.882.32 2.412.391q1.002.078 2.002 0a5 5 0 0 0 1.432-.26c.325-.204.577-.505.72-.861m-2.212 0q-.923.022-1.841-.07L8.569 3.6a14 14 0 0 1-.56-1.482a10 10 0 0 1-.281-.92a11.5 11.5 0 0 1 1.591-.1l6.036-.09h.66c-.16.43-.46 1.17-.78 1.83c-.46 1.032-.17 1.172-1.712 1.172"/><path d="M19.96 18.204a2.1 2.1 0 0 0-1.162-1.581a5.16 5.16 0 0 0-2.552-.35a3 3 0 0 1-1.001-.07a.49.49 0 0 1-.38-.421a1.7 1.7 0 0 1 .77-1.542a3 3 0 0 1 1.902-.67c.324-.003.644.062.94.19q.472.21.882.52a.3.3 0 0 0 .42-.06a.29.29 0 0 0-.05-.42a4.8 4.8 0 0 0-1-.66a3.4 3.4 0 0 0-1.172-.33q.023-.301 0-.601a12 12 0 0 1-.1-1.322a.3.3 0 0 0-.26-.34a.3.3 0 0 0-.34.25a4.8 4.8 0 0 0-.21 1.221q-.023.24 0 .48c0 .11 0 .211.07.331c-.781.12-1.51.468-2.093 1.001a2.55 2.55 0 0 0-.89 2.092a1.49 1.49 0 0 0 .79 1.231a3.34 3.34 0 0 0 1.752.29a4.1 4.1 0 0 1 2.002.21a1.05 1.05 0 0 1 .6.771a1.83 1.83 0 0 1-.8 1.742a2.68 2.68 0 0 1-2.052.64a1.55 1.55 0 0 1-.681-.3a3 3 0 0 1-.59-.57a.34.34 0 0 0-.36-.129a.34.34 0 0 0-.253.285a.35.35 0 0 0 .062.254c.238.338.533.633.87.87c.243.177.519.3.812.361c.291.045.588.045.88 0a5 5 0 0 0-.15.881a2.7 2.7 0 0 0 0 .49q.042.365.13.721a.33.33 0 0 0 .35.33a.35.35 0 0 0 .33-.36c0-.31.101-.63.101-.95c0-.321-.08-.832-.08-1.242c.427-.124.83-.32 1.191-.58a2.86 2.86 0 0 0 1.321-2.663"/></g></svg>
        Ver Bitacora de gastos
      </a>
        <a href="{{ route('reports.index') }}" class="ns-btn ns-btn-rose">
       <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" viewBox="0 0 24 24"><g fill="none" stroke="#fff" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"><path d="M15.093 12.343a2.43 2.43 0 0 0 2.031.956c1.244 0 2.254-.757 2.254-1.691s-1.01-1.69-2.254-1.69s-2.255-.758-2.255-1.692s1.01-1.691 2.255-1.691a2.43 2.43 0 0 1 2.031.956M17.124 13.3v1.126m0-9.018v1.127"/><path d="M20.354 2.25H3.646A2.646 2.646 0 0 0 1 4.896v10.708a2.646 2.646 0 0 0 2.646 2.646h16.708A2.646 2.646 0 0 0 23 15.604V4.896a2.646 2.646 0 0 0-2.646-2.646M12 18.25v3.5m-5 0h10M4.622 6.689h6.012m-6.012 3.826h6.012m-6.012 3.826h3.006"/></g></svg>
       Reportes
      </a>
      </form>
    </div>

    {{-- TODAY'S APPOINTMENTS --}}
    <div class="ns-card ns-card-appts">
      <div class="ns-appts-header">
        <div class="ns-section-title">
          <span class="ns-dot"></span>
          Citas de Hoy
        </div>
        <span class="ns-appt-date">{{ date('d M, Y') }}</span>
      </div>

      @if($citasHoy->isEmpty())
        <div class="ns-empty">
          <p>No hay citas para el día de hoy.</p>
        </div>
      @else
        <div class="ns-appt-list">
          @foreach($citasHoy as $cita)
            <div class="ns-appt">
              <div class="ns-appt-left">
                <div class="ns-appt-time">
                  <span class="ns-appt-hour">{{ \Carbon\Carbon::parse($cita->start_time)->format('h:i') }}</span>
                  <span class="ns-appt-ampm">{{ \Carbon\Carbon::parse($cita->start_time)->format('A') }}</span>
                </div>
                <div>
                  <div class="ns-appt-name">{{ $cita->client_name }}</div>
                  <div class="ns-appt-services">{{ $cita->services->implode('name', ', ') }}</div>
                </div>
              </div>
              <div class="ns-appt-right">
                <span class="ns-appt-price">L. {{ number_format($cita->total, 2) }}</span>
                @if($cita->status == 'pending')
                  <form action="{{ route('appointments.complete', $cita->id) }}" method="POST">
                    @csrf @method('PATCH')
                    <button type="submit" class="ns-btn-complete">Finalizar</button>
                  </form>
                @else
                  <span class="ns-badge-done">Completada</span>
                @endif
              </div>
            </div>
          @endforeach
        </div>
      @endif
    </div>

  </div>
</div>
</x-app-layout>