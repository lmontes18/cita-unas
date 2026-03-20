<x-app-layout>
<style>
  @import url('https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,700;0,900;1,700&family=DM+Sans:wght@300;400;500;600&display=swap');

  .rp-wrap *, .rp-wrap *::before, .rp-wrap *::after { box-sizing: border-box; }

  .rp-wrap {
    --rose: #f43f72;
    --rose-light: #fce7ef;
    --ink: #1a1018;
    --sand: #faf6f2;
    --sand-dark: #f0e9e1;
    --cream: #fffbf8;
    --green: #16a34a;
    --green-light: #dcfce7;
    --red: #ef4444;
    --red-light: #fff1f1;
    --slate: #64748b;
    --border: #e8ddd6;
    font-family: 'DM Sans', sans-serif;
    background: var(--sand);
    min-height: 100vh;
    padding: 36px 20px 60px;
    position: relative;
  }

  .rp-wrap::before {
    content: '';
    position: fixed;
    inset: 0;
    background:
      radial-gradient(circle at 15% 8%, rgba(244,63,114,0.06) 0%, transparent 50%),
      radial-gradient(circle at 88% 85%, rgba(244,63,114,0.04) 0%, transparent 40%);
    pointer-events: none;
    z-index: 0;
  }

  .rp-inner {
    max-width: 900px;
    margin: 0 auto;
    position: relative;
    z-index: 1;
  }

  /* HEADER */
  .rp-header {
    display: flex;
    justify-content: space-between;
    align-items: flex-end;
    margin-bottom: 32px;
    animation: rpFadeUp 0.4s ease both;
  }
  .rp-eyebrow {
    font-size: 10px;
    font-weight: 600;
    letter-spacing: 0.2em;
    text-transform: uppercase;
    color: var(--rose);
    margin-bottom: 4px;
  }
  .rp-title {
    font-family: 'Playfair Display', serif;
    font-size: 28px;
    font-weight: 900;
    color: var(--ink);
    line-height: 1;
  }
  .rp-month-badge {
    font-size: 11px;
    font-weight: 700;
    letter-spacing: 0.1em;
    text-transform: uppercase;
    background: var(--rose-light);
    color: var(--rose);
    padding: 6px 16px;
    border-radius: 20px;
  }

  /* TOP GRID */
  .rp-top-grid {
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 16px;
    margin-bottom: 24px;
  }

  .rp-card {
    background: var(--cream);
    border: 1px solid var(--border);
    border-radius: 20px;
    padding: 28px;
    position: relative;
    overflow: hidden;
    transition: transform 0.15s;
  }
  .rp-card:hover { transform: translateY(-2px); }

  /* Income card accent */
  .rp-card-income::after {
    content: '';
    position: absolute;
    bottom: 0; left: 0; right: 0;
    height: 3px;
    background: var(--green);
    border-radius: 0 0 20px 20px;
  }

  /* Services card accent */
  .rp-card-services::after {
    content: '';
    position: absolute;
    bottom: 0; left: 0; right: 0;
    height: 3px;
    background: var(--rose);
    border-radius: 0 0 20px 20px;
  }

  .rp-card-label {
    font-size: 9px;
    font-weight: 700;
    letter-spacing: 0.18em;
    text-transform: uppercase;
    color: var(--slate);
    margin-bottom: 14px;
  }

  .rp-income-amount {
    font-family: 'Playfair Display', serif;
    font-size: 34px;
    font-weight: 900;
    color: var(--ink);
    line-height: 1;
    margin-bottom: 10px;
  }
  .rp-income-amount span {
    font-size: 16px;
    font-weight: 400;
    font-family: 'DM Sans', sans-serif;
    color: var(--slate);
    margin-right: 3px;
  }

  .rp-diff {
    display: inline-flex;
    align-items: center;
    gap: 5px;
    font-size: 12px;
    font-weight: 600;
    padding: 4px 12px;
    border-radius: 20px;
  }
  .rp-diff-up   { background: var(--green-light); color: var(--green); }
  .rp-diff-down { background: var(--red-light);   color: var(--red); }
  .rp-diff-sub  { font-size: 11px; opacity: 0.7; }

  /* TOP SERVICES */
  .rp-service-row {
    display: flex;
    align-items: center;
    justify-content: space-between;
    padding: 9px 0;
    border-bottom: 1px solid var(--border);
  }
  .rp-service-row:last-child { border-bottom: none; padding-bottom: 0; }
  .rp-service-left { display: flex; align-items: center; gap: 10px; }

  .rp-rank {
    width: 24px; height: 24px;
    display: flex; align-items: center; justify-content: center;
    background: var(--ink);
    color: white;
    font-size: 10px;
    font-weight: 700;
    border-radius: 50%;
    flex-shrink: 0;
  }
  .rp-rank-1 { background: var(--rose); }
  .rp-rank-2 { background: #9d6fb0; }
  .rp-rank-3 { background: var(--slate); }

  .rp-service-name {
    font-size: 13px;
    font-weight: 500;
    color: var(--ink);
  }

  .rp-service-count {
    font-size: 11px;
    font-weight: 700;
    color: var(--rose);
    background: var(--rose-light);
    padding: 3px 10px;
    border-radius: 20px;
  }

  /* BAR for top service */
  .rp-bar-wrap {
    margin-top: 4px;
    height: 3px;
    background: var(--sand-dark);
    border-radius: 3px;
    overflow: hidden;
  }
  .rp-bar { height: 100%; background: var(--rose); border-radius: 3px; }

  /* SALES TABLE */
  .rp-table-card {
    background: var(--cream);
    border: 1px solid var(--border);
    border-radius: 20px;
    overflow: hidden;
    animation: rpFadeUp 0.4s 0.2s ease both;
  }

  .rp-table-header {
    display: flex;
    justify-content: space-between;
    align-items: center;
    padding: 20px 24px;
    border-bottom: 1px solid var(--border);
    background: var(--sand-dark);
  }
  .rp-table-title {
    font-family: 'Playfair Display', serif;
    font-size: 17px;
    font-weight: 700;
    color: var(--ink);
    display: flex;
    align-items: center;
    gap: 8px;
  }
  .rp-dot { width: 8px; height: 8px; background: var(--rose); border-radius: 50%; }

  .rp-table { width: 100%; border-collapse: collapse; }
  .rp-table thead tr { border-bottom: 1px solid var(--border); }
  .rp-table th {
    padding: 13px 20px;
    font-size: 9px;
    font-weight: 700;
    letter-spacing: 0.18em;
    text-transform: uppercase;
    color: var(--slate);
    text-align: left;
    background: var(--sand);
  }
  .rp-table th.right { text-align: right; }

  .rp-table tbody tr {
    border-bottom: 1px solid var(--border);
    transition: background 0.12s;
  }
  .rp-table tbody tr:last-child { border-bottom: none; }
  .rp-table tbody tr:hover { background: var(--sand); }

  .rp-table td { padding: 15px 20px; vertical-align: middle; }

  .rp-td-date { font-size: 12px; color: var(--slate); white-space: nowrap; }
  .rp-td-client { font-size: 14px; font-weight: 600; color: var(--ink); }

  .rp-service-tag {
    display: inline-block;
    font-size: 10px;
    font-weight: 600;
    background: var(--sand-dark);
    color: var(--slate);
    padding: 3px 9px;
    border-radius: 20px;
    margin: 2px 2px 2px 0;
  }

  .rp-td-amount {
    text-align: right;
    font-family: 'Playfair Display', serif;
    font-size: 15px;
    font-weight: 700;
    color: var(--green);
    white-space: nowrap;
  }

  .rp-pagination {
    padding: 16px 20px;
    background: var(--sand-dark);
    border-top: 1px solid var(--border);
  }

  /* ANIMATION */
  .rp-top-grid { animation: rpFadeUp 0.4s 0.1s ease both; }

  @keyframes rpFadeUp {
    from { opacity: 0; transform: translateY(14px); }
    to   { opacity: 1; transform: translateY(0); }
  }

  @media (max-width: 620px) {
    .rp-top-grid { grid-template-columns: 1fr; }
    .rp-income-amount { font-size: 26px; }
    .rp-table thead { display: none; }
    .rp-table tbody tr { display: flex; flex-direction: column; padding: 14px 16px; gap: 4px; }
    .rp-table td { padding: 2px 0; border: none; }
    .rp-td-amount { text-align: left; }
  }
</style>

<div class="rp-wrap">
  <div class="rp-inner">

    {{-- HEADER --}}
    <div class="rp-header">
      <div>
        <div class="rp-eyebrow">✦ Análisis</div>
        <h2 class="rp-title">Reportes de Ventas</h2>
      </div>
      <span class="rp-month-badge">{{ Carbon\Carbon::now()->translatedFormat('F Y') }}</span>
    </div>

    {{-- TOP CARDS --}}
    <div class="rp-top-grid">

      {{-- Ingresos --}}
      <div class="rp-card rp-card-income">
        <div class="rp-card-label">Ingresos · Mes Actual</div>
        <div class="rp-income-amount">
          <span>L.</span>{{ number_format($ingresosMesActual, 2) }}
        </div>
        @php $diferencia = $ingresosMesActual - $ingresosMesPasado; @endphp
        <span class="rp-diff {{ $diferencia >= 0 ? 'rp-diff-up' : 'rp-diff-down' }}">
          {{ $diferencia >= 0 ? '↑' : '↓' }}
          L. {{ number_format(abs($diferencia), 2) }}
          <span class="rp-diff-sub">vs mes anterior</span>
        </span>
      </div>

      {{-- Top Servicios --}}
      <div class="rp-card rp-card-services">
        <div class="rp-card-label">Servicios Estrellas ✦</div>
        @php $maxUsos = $topServicios->max('total_usos') ?: 1; @endphp
        @foreach($topServicios as $index => $servicio)
          <div class="rp-service-row">
            <div class="rp-service-left">
              <span class="rp-rank {{ $index == 0 ? 'rp-rank-1' : ($index == 1 ? 'rp-rank-2' : ($index == 2 ? 'rp-rank-3' : '')) }}">
                {{ $index + 1 }}
              </span>
              <div>
                <div class="rp-service-name">{{ $servicio->name }}</div>
                @if($index == 0)
                  <div class="rp-bar-wrap" style="width:90px">
                    <div class="rp-bar" style="width:{{ round(($servicio->total_usos / $maxUsos) * 100) }}%"></div>
                  </div>
                @endif
              </div>
            </div>
            <span class="rp-service-count">{{ $servicio->total_usos }} citas</span>
          </div>
        @endforeach
      </div>

    </div>

    {{-- SALES TABLE --}}
    <div class="rp-table-card">
      <div class="rp-table-header">
        <div class="rp-table-title">
          <span class="rp-dot"></span>
          Historial de Ventas
        </div>
      </div>

      <div style="overflow-x:auto">
        <table class="rp-table">
          <thead>
            <tr>
              <th>Fecha</th>
              <th>Cliente</th>
              <th>Servicios</th>
              <th class="right">Monto Final</th>
            </tr>
          </thead>
          <tbody>
            @foreach($ventas as $venta)
              <tr>
                <td class="rp-td-date">
                  {{ \Carbon\Carbon::parse($venta->start_time)->format('d/m/Y') }}
                </td>
                <td class="rp-td-client">{{ $venta->client_name }}</td>
                <td>
                  @foreach($venta->services as $s)
                    <span class="rp-service-tag">{{ $s->name }}</span>
                  @endforeach
                </td>
                <td class="rp-td-amount">L. {{ number_format($venta->total, 2) }}</td>
              </tr>
            @endforeach
          </tbody>
        </table>
      </div>

      <div class="rp-pagination">
        {{ $ventas->links() }}
      </div>
    </div>

  </div>
</div>
</x-app-layout>