<x-app-layout>
  <style>
    @import url('https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,700;0,900&family=DM+Sans:wght@300;400;500;600&display=swap');

    .al-wrap *,
    .al-wrap *::before,
    .al-wrap *::after {
      box-sizing: border-box;
    }

    .al-wrap {
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
      padding: 36px 20px 60px;
      position: relative;
    }

    .al-wrap::before {
      content: '';
      position: fixed;
      inset: 0;
      background:
        radial-gradient(circle at 15% 10%, rgba(244, 63, 114, 0.05) 0%, transparent 50%),
        radial-gradient(circle at 85% 85%, rgba(244, 63, 114, 0.04) 0%, transparent 40%);
      pointer-events: none;
      z-index: 0;
    }

    /* Nuevos Colores y Botones */
    .al-badge-cancelled {
      background: #fee2e2;
      color: #991b1b;
    }

    .al-actions-group {
      display: flex;
      gap: 8px;
      justify-content: center;
    }

    .al-edit-btn {
      color: var(--slate);
      padding: 7px;
      border-radius: 8px;
      transition: all 0.2s;
    }

    .al-edit-btn:hover {
      background: var(--sand-dark);
      color: var(--ink);
    }

    .al-cancel-btn {
      background: none;
      border: none;
      color: #ef4444;
      font-size: 10px;
      font-weight: 700;
      cursor: pointer;
      text-transform: uppercase;
      padding: 7px;
    }

    .al-cancel-btn:hover {
      text-decoration: underline;
    }

    .al-inner {
      max-width: 900px;
      margin: 0 auto;
      position: relative;
      z-index: 1;
    }

    /* HEADER */
    .al-header {
      display: flex;
      justify-content: space-between;
      align-items: flex-end;
      margin-bottom: 32px;
      animation: alFadeUp 0.4s ease both;
    }

    .al-title-eyebrow {
      font-size: 10px;
      font-weight: 600;
      letter-spacing: 0.2em;
      text-transform: uppercase;
      color: var(--rose);
      margin-bottom: 4px;
    }

    .al-title {
      font-family: 'Playfair Display', serif;
      font-size: 26px;
      font-weight: 900;
      color: var(--ink);
      line-height: 1;
    }

    .al-new-btn {
      display: inline-flex;
      align-items: center;
      gap: 8px;
      background: var(--rose);
      color: white;
      text-decoration: none;
      font-size: 13px;
      font-weight: 600;
      padding: 12px 22px;
      border-radius: 14px;
      box-shadow: 0 4px 20px rgba(244, 63, 114, 0.28);
      transition: transform 0.15s, box-shadow 0.15s;
      letter-spacing: 0.02em;
    }

    .al-new-btn:hover {
      transform: translateY(-2px);
      box-shadow: 0 8px 28px rgba(244, 63, 114, 0.38);
    }

    .al-new-btn:active {
      transform: scale(0.97);
    }

    .al-new-btn svg {
      width: 16px;
      height: 16px;
    }

    /* TABLE CARD */
    .al-card {
      background: var(--cream);
      border: 1px solid var(--border);
      border-radius: 20px;
      overflow: hidden;
      animation: alFadeUp 0.4s 0.1s ease both;
    }

    /* TABLE */
    .al-table {
      width: 100%;
      border-collapse: collapse;
    }

    .al-table thead tr {
      background: var(--sand-dark);
      border-bottom: 1px solid var(--border);
    }

    .al-table th {
      padding: 14px 18px;
      font-size: 9px;
      font-weight: 700;
      letter-spacing: 0.18em;
      text-transform: uppercase;
      color: var(--slate);
      text-align: left;
      white-space: nowrap;
    }

    .al-table th.center {
      text-align: center;
    }

    .al-table tbody tr {
      border-bottom: 1px solid var(--border);
      transition: background 0.12s ease;
    }

    .al-table tbody tr:last-child {
      border-bottom: none;
    }

    .al-table tbody tr:hover {
      background: var(--sand);
    }

    .al-table td {
      padding: 16px 18px;
      vertical-align: middle;
    }

    /* CLIENT CELL */
    .al-client-name {
      font-weight: 600;
      font-size: 14px;
      color: var(--ink);
      line-height: 1.2;
    }

    .al-client-phone {
      font-size: 11px;
      color: var(--slate);
      margin-top: 2px;
    }

    /* SERVICES CELL */
    .al-service {
      font-size: 11px;
      color: var(--slate);
      font-style: italic;
      line-height: 1.7;
    }

    .al-service::before {
      content: '· ';
      color: var(--rose);
      font-style: normal;
      font-weight: 700;
    }

    /* TOTAL */
    .al-total {
      font-family: 'Playfair Display', serif;
      font-size: 15px;
      font-weight: 700;
      color: #16a34a;
      white-space: nowrap;
    }

    /* DATE */
    .al-date {
      font-size: 13px;
      color: var(--ink);
      white-space: nowrap;
    }

    /* STATUS BADGE */
    .al-badge {
      display: inline-block;
      font-size: 9px;
      font-weight: 700;
      letter-spacing: 0.12em;
      text-transform: uppercase;
      padding: 4px 12px;
      border-radius: 20px;
    }

    .al-badge-pending {
      background: #fef9c3;
      color: #854d0e;
    }

    .al-badge-done {
      background: #dcfce7;
      color: #166534;
    }

    /* ACTIONS */
    .al-action-cell {
      text-align: center;
    }

    .al-complete-btn {
      display: inline-flex;
      align-items: center;
      gap: 6px;
      font-size: 10px;
      font-weight: 700;
      letter-spacing: 0.08em;
      text-transform: uppercase;
      background: var(--green);
      color: white;
      border: none;
      padding: 7px 14px;
      border-radius: 20px;
      cursor: pointer;
      box-shadow: 0 2px 10px rgba(34, 197, 94, 0.25);
      transition: background 0.15s, transform 0.1s;
    }

    .al-complete-btn:hover {
      background: #16a34a;
      transform: scale(1.04);
    }

    .al-complete-btn:active {
      transform: scale(0.95);
    }

    .al-complete-btn svg {
      width: 12px;
      height: 12px;
    }

    .al-no-action {
      font-size: 11px;
      color: #c0b0bb;
      font-style: italic;
    }

    /* PAGINATION */
    .al-pagination {
      padding: 16px 18px;
      border-top: 1px solid var(--border);
      background: var(--sand-dark);
      border-radius: 0 0 20px 20px;
    }

    /* ANIMATIONS */
    @keyframes alFadeUp {
      from {
        opacity: 0;
        transform: translateY(14px);
      }

      to {
        opacity: 1;
        transform: translateY(0);
      }
    }

    /* RESPONSIVE */
    @media (max-width: 640px) {
      .al-table thead {
        display: none;
      }

      .al-table tbody tr {
        display: flex;
        flex-direction: column;
        padding: 16px;
        gap: 6px;
      }

      .al-table td {
        padding: 2px 0;
        border: none;
      }

      .al-action-cell {
        text-align: left;
      }
    }
  </style>

  <div class="al-wrap">
    <div class="al-inner">

      {{-- HEADER --}}
      <div class="al-header">
        <div>
          <div class="al-title-eyebrow">✦ Gestión</div>
          <h2 class="al-title">Listado de Citas</h2>
        </div>
        <a href="{{ route('appointments.create') }}" class="al-new-btn">
          <svg fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M12 4v16m8-8H4" />
          </svg>
          Nueva Cita
        </a>
      </div>

      {{-- TABLE --}}
      <div class="al-card">
        <table class="al-table">
          <thead>
            <tr>
              <th>Cliente</th>
              <th>Servicio</th>
              <th>Total</th>
              <th>Fecha y Hora</th>
              <th>Estado</th>
              <th class="center">Acciones</th>
            </tr>
          </thead>
          <tbody>
            @foreach($appointments as $app)
              <tr>
                <td>
                  <div class="al-client-name">{{ $app->client_name }}</div>
                  <div class="al-client-phone">{{ $app->client_phone }}</div>
                </td>
                <td>
                  @foreach($app->services as $s)
                    <span class="al-service block">{{ $s->name }}</span>
                  @endforeach
                </td>
                <td>
                  <span class="al-total">L. {{ number_format($app->total, 2) }}</span>
                </td>
                <td>
                  <span class="al-date">{{ \Carbon\Carbon::parse($app->start_time)->format('d/m/Y h:i A') }}</span>
                </td>
                <td>
                  <span class="al-badge {{ $app->status == 'pending' ? 'al-badge-pending' : 'al-badge-done' }}">
                    {{ strtoupper($app->status) }}
                  </span>
                </td>
                <td class="al-action-cell">
                  <div class="al-actions-group">
                    @if($app->status == 'pending')
                      {{-- Botón Finalizar --}}
                      <form action="{{ route('appointments.complete', $app->id) }}" method="POST">
                        @csrf @method('PATCH')
                        <button type="submit" class="al-complete-btn" title="Finalizar">
                          <svg fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M5 13l4 4L19 7" />
                          </svg>
                        </button>
                      </form>

                      {{-- Botón Editar --}}
                      <a href="{{ route('appointments.edit', $app->id) }}" class="al-edit-btn" title="Editar">
                        <svg style="width:18px;height:18px" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z" />
                        </svg>
                      </a>

                      {{-- Botón Cancelar --}}
                      <form action="{{ route('appointments.cancel', $app->id) }}" method="POST"
                        onsubmit="return confirm('¿Seguro que deseas cancelar esta cita?')">
                        @csrf @method('PATCH')
                        <button type="submit" class="al-cancel-btn">Cancelar</button>
                      </form>

                    @elseif($app->status == 'cancelled')
                      <span class="al-no-action">Cancelada</span>
                    @else
                      <span class="al-no-action">Completada</span>
                    @endif
                  </div>
                </td>
              </tr>
            @endforeach
          </tbody>
        </table>

        <div class="al-pagination">
          {{ $appointments->links() }}
        </div>
      </div>

    </div>
  </div>
</x-app-layout>