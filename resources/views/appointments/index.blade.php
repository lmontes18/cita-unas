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
      background: radial-gradient(circle at 15% 10%, rgba(244, 63, 114, 0.05) 0%, transparent 50%),
        radial-gradient(circle at 85% 85%, rgba(244, 63, 114, 0.04) 0%, transparent 40%);
      pointer-events: none;
      z-index: 0;
    }

    /* MODAL STYLES */
    .al-modal-overlay {
      position: fixed;
      inset: 0;
      background: rgba(26, 16, 24, 0.4);
      backdrop-filter: blur(4px);
      display: flex;
      align-items: center;
      justify-content: center;
      z-index: 9999;
    }

    .al-modal-content {
      background: var(--cream);
      width: 90%;
      max-width: 400px;
      border-radius: 24px;
      padding: 30px;
      box-shadow: 0 20px 50px rgba(0, 0, 0, 0.15);
      animation: alFadeUp 0.3s ease-out;
    }

    .al-modal-header {
      display: flex;
      justify-content: space-between;
      align-items: center;
      margin-bottom: 20px;
    }

    .al-modal-header h3 {
      font-family: 'Playfair Display', serif;
      font-size: 22px;
      margin: 0;
      color: var(--ink);
    }

    .close-x {
      background: none;
      border: none;
      font-size: 24px;
      cursor: pointer;
      color: var(--slate);
    }

    .al-modal-body p {
      font-size: 14px;
      color: var(--slate);
      margin: 5px 0;
    }

    .al-field label {
      display: block;
      font-size: 10px;
      font-weight: 700;
      color: var(--rose);
      letter-spacing: 0.1em;
      margin-top: 20px;
      text-transform: uppercase;
    }

    .al-field input {
      width: 100%;
      border: 1px solid var(--border);
      border-radius: 12px;
      padding: 12px;
      font-size: 16px;
      font-weight: 600;
      margin-top: 5px;
      outline: none;
    }

    .al-hint {
      font-size: 11px;
      font-style: italic;
      color: var(--slate);
      margin-top: 10px;
    }

    .al-modal-footer {
      display: flex;
      justify-content: flex-end;
      gap: 15px;
      margin-top: 25px;
      align-items: center;
    }

    .al-btn-link {
      background: none;
      border: none;
      color: var(--slate);
      font-weight: 600;
      font-size: 13px;
      cursor: pointer;
    }

    /* REST OF YOUR STYLES... */
    .al-actions-group {
      display: flex;
      gap: 8px;
      justify-content: center;
      align-items: center;
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

    .al-header {
      display: flex;
      justify-content: space-between;
      align-items: flex-end;
      margin-bottom: 32px;
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
      border: none;
      cursor: pointer;
    }

    .al-card {
      background: var(--cream);
      border: 1px solid var(--border);
      border-radius: 20px;
      overflow: hidden;
    }

    .al-table {
      width: 100%;
      border-collapse: collapse;
    }

    .al-table th {
      padding: 14px 18px;
      font-size: 9px;
      font-weight: 700;
      letter-spacing: 0.18em;
      text-transform: uppercase;
      color: var(--slate);
      text-align: left;
      background: var(--sand-dark);
      border-bottom: 1px solid var(--border);
    }

    .al-table td {
      padding: 16px 18px;
      vertical-align: middle;
      border-bottom: 1px solid var(--border);
    }

    .al-client-name {
      font-weight: 600;
      font-size: 14px;
      color: var(--ink);
    }

    .al-total {
      font-family: 'Playfair Display', serif;
      font-size: 15px;
      font-weight: 700;
      color: #16a34a;
    }

    .al-badge {
      font-size: 9px;
      font-weight: 700;
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

    .al-complete-btn {
      background: var(--green);
      color: white;
      border: none;
      padding: 7px 14px;
      border-radius: 20px;
      cursor: pointer;
      transition: transform 0.1s;
    }

    .al-complete-btn:hover {
      transform: scale(1.05);
      background: #16a34a;
    }

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
  </style>

  <div class="al-wrap">
    <div class="al-inner">
      <div class="al-header">
        <div>
          <div class="al-title-eyebrow">✦ Gestión</div>
          <h2 class="al-title">Listado de Citas</h2>
        </div>
        <a href="{{ route('appointments.create') }}" class="al-new-btn">Nueva Cita</a>
      </div>

      <div class="al-card">
        <table class="al-table">
          <thead>
            <tr>
              <th>Cliente</th>
              <th>Servicio</th>
              <th>Total</th>
              <th>Fecha y Hora</th>
              <th>Estado</th>
              <th style="text-align:center">Acciones</th>
            </tr>
          </thead>
          <tbody>
            @foreach($appointments as $app)
              <tr>
                <td>
                  <div class="al-client-name">{{ $app->client_name }}</div>
                  <div style="font-size:11px; color:var(--slate)">{{ $app->client_phone }}</div>
                </td>
                <td>
                  @foreach($app->services as $s)
                    <div style="font-size:11px; color:var(--slate)">· {{ $s->name }}</div>
                  @endforeach
                </td>
                <td>
                  <div class="al-total-container">
                    {{-- Precio Final Real --}}
                    <span class="al-total">
                      L. {{ number_format($app->final_price > 0 ? $app->final_price : $app->total, 2) }}
                    </span>

                    {{-- Cálculo del Extra --}}
                    @if($app->status == 'completed' && $app->final_price > $app->total)
                      <div style="font-size: 10px; color: var(--rose); font-weight: 700; margin-top: 2px;">
                        + L. {{ number_format($app->final_price - $app->total, 2) }} EXTRA
                      </div>
                    @endif
                  </div>
                </td>
                <td><span
                    style="font-size:13px">{{ \Carbon\Carbon::parse($app->start_time)->format('d/m/Y h:i A') }}</span>
                </td>
                <td>
                  <span class="al-badge {{ $app->status == 'pending' ? 'al-badge-pending' : 'al-badge-done' }}">
                    {{ strtoupper($app->status) }}
                  </span>
                </td>
                <td class="al-action-cell">
                  <div class="al-actions-group">
                    @if($app->status == 'pending')
                      {{-- BOTÓN SIN FORM --}}
                      <button type="button" class="al-complete-btn" onclick="openModal('{{ $app->id }}')">
                        <svg style="width:12px" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M5 13l4 4L19 7" />
                        </svg>
                      </button>

                      <a href="{{ route('appointments.edit', $app->id) }}" class="al-edit-btn">
                        <svg style="width:18px" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z" />
                        </svg>
                      </a>

                      <form action="{{ route('appointments.cancel', $app->id) }}" method="POST"
                        onsubmit="return confirm('¿Cancelar cita?')">
                        @csrf @method('PATCH')
                        <button type="submit" class="al-cancel-btn">Cancelar</button>
                      </form>
                    @else
                      <span style="font-size:11px; color:var(--slate); font-style:italic">Finalizada</span>
                    @endif
                  </div>
                </td>
              </tr>
            @endforeach
          </tbody>
        </table>

        {{-- MODALES FUERA DE LA TABLA --}}
        @foreach($appointments as $app)
          <div id="modal-{{ $app->id }}" class="al-modal-overlay" style="display:none;">
            <div class="al-modal-content">
              <div class="al-modal-header">
                <h3>Finalizar Trabajo</h3>
                <button type="button" onclick="closeModal('{{ $app->id }}')" class="close-x">&times;</button>
              </div>
              <form action="{{ route('appointments.complete', $app->id) }}" method="POST">
                @csrf @method('PATCH')
                <div class="al-modal-body">
                  <p>Cliente: <strong>{{ $app->client_name }}</strong></p>
                  <p>Precio base: <strong>L. {{ number_format($app->total, 2) }}</strong></p>

                  <div class="al-field">
                    <label>Monto Final a Cobrar</label>
                    <input type="number" name="final_price" value="{{ $app->total }}" step="0.01" required autofocus>
                  </div>
                  <p class="al-hint">* Ajusta el precio si hubo cargos extra.</p>
                </div>
                <div class="al-modal-footer">
                  <button type="button" onclick="closeModal('{{ $app->id }}')" class="al-btn-link">Cerrar</button>
                  <button type="submit" class="al-new-btn">Confirmar Cobro</button>
                </div>
              </form>
            </div>
          </div>
        @endforeach

        <div class="al-pagination">
          {{ $appointments->links() }}
        </div>
      </div>
    </div>
  </div>

  <script>
    function openModal(id) {
      document.getElementById('modal-' + id).style.display = 'flex';
    }
    function closeModal(id) {
      document.getElementById('modal-' + id).style.display = 'none';
    }
    window.onclick = function (event) {
      if (event.target.className === 'al-modal-overlay') {
        event.target.style.display = 'none';
      }
    }
  </script>
</x-app-layout>