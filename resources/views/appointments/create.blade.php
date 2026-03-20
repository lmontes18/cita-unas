<x-app-layout>
<style>
  @import url('https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,700;0,900&family=DM+Sans:wght@300;400;500;600&display=swap');

  .ac-wrap *, .ac-wrap *::before, .ac-wrap *::after { box-sizing: border-box; }

  .ac-wrap {
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
    padding: 40px 20px 60px;
    position: relative;
  }

  .ac-wrap::before {
    content: '';
    position: fixed;
    inset: 0;
    background:
      radial-gradient(circle at 10% 10%, rgba(244,63,114,0.06) 0%, transparent 50%),
      radial-gradient(circle at 90% 90%, rgba(244,63,114,0.04) 0%, transparent 40%);
    pointer-events: none;
    z-index: 0;
  }

  .ac-inner {
    max-width: 620px;
    margin: 0 auto;
    position: relative;
    z-index: 1;
  }

  /* HEADER */
  .ac-header {
    margin-bottom: 28px;
    animation: acFadeUp 0.4s ease both;
  }
  .ac-eyebrow {
    font-size: 10px;
    font-weight: 600;
    letter-spacing: 0.2em;
    text-transform: uppercase;
    color: var(--rose);
    margin-bottom: 4px;
  }
  .ac-title {
    font-family: 'Playfair Display', serif;
    font-size: 26px;
    font-weight: 900;
    color: var(--ink);
    line-height: 1.1;
  }

  /* CARD */
  .ac-card {
    background: var(--cream);
    border: 1px solid var(--border);
    border-radius: 22px;
    padding: 32px;
    animation: acFadeUp 0.4s 0.1s ease both;
  }

  /* FIELD */
  .ac-field {
    margin-bottom: 22px;
  }

  .ac-label {
    display: block;
    font-size: 10px;
    font-weight: 700;
    letter-spacing: 0.15em;
    text-transform: uppercase;
    color: var(--slate);
    margin-bottom: 8px;
    padding-left: 2px;
  }

  .ac-input,
  .ac-select,
  .ac-textarea {
    width: 100%;
    padding: 12px 16px;
    border: 1.5px solid var(--border);
    border-radius: 13px;
    font-family: 'DM Sans', sans-serif;
    font-size: 14px;
    color: var(--ink);
    background: white;
    outline: none;
    transition: border-color 0.15s, box-shadow 0.15s;
    appearance: none;
    -webkit-appearance: none;
  }
  .ac-input:focus,
  .ac-select:focus,
  .ac-textarea:focus {
    border-color: var(--rose);
    box-shadow: 0 0 0 3px rgba(244,63,114,0.1);
  }
  .ac-input::placeholder,
  .ac-textarea::placeholder { color: #c0b0bb; }

  .ac-select-wrap {
    position: relative;
  }
  .ac-select-wrap::after {
    content: '';
    position: absolute;
    right: 16px;
    top: 50%;
    transform: translateY(-50%);
    width: 0; height: 0;
    border-left: 5px solid transparent;
    border-right: 5px solid transparent;
    border-top: 6px solid var(--slate);
    pointer-events: none;
  }
  .ac-select { padding-right: 38px; cursor: pointer; }

  .ac-textarea { resize: vertical; min-height: 90px; }

  /* TWO COLS */
  .ac-row {
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 16px;
  }

  /* SERVICES GRID */
  .ac-services-grid {
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 8px;
  }

  .ac-service-label {
    display: flex;
    align-items: center;
    gap: 10px;
    padding: 11px 14px;
    border: 1.5px solid var(--border);
    border-radius: 12px;
    cursor: pointer;
    background: white;
    transition: border-color 0.15s, background 0.15s, box-shadow 0.15s;
  }
  .ac-service-label:hover {
    border-color: var(--rose-light);
    background: var(--rose-light);
  }
  .ac-service-label:has(input:checked) {
    border-color: var(--rose);
    background: var(--rose-light);
    box-shadow: 0 0 0 3px rgba(244,63,114,0.08);
  }

  .ac-service-label input[type="checkbox"] {
    width: 16px;
    height: 16px;
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
  .ac-service-label input[type="checkbox"]:checked {
    background: var(--rose);
    border-color: var(--rose);
  }
  .ac-service-label input[type="checkbox"]:checked::after {
    content: '';
    position: absolute;
    left: 4px; top: 1px;
    width: 5px; height: 9px;
    border: 2px solid white;
    border-top: none;
    border-left: none;
    transform: rotate(45deg);
  }

  .ac-service-text {
    font-size: 12px;
    font-weight: 500;
    color: var(--ink);
    line-height: 1.3;
  }
  .ac-service-price {
    font-size: 11px;
    color: var(--slate);
    margin-top: 1px;
  }

  /* DIVIDER */
  .ac-divider {
    border: none;
    border-top: 1px solid var(--border);
    margin: 24px 0;
  }

  /* ACTIONS */
  .ac-actions {
    display: flex;
    justify-content: flex-end;
    gap: 12px;
    align-items: center;
    margin-top: 8px;
  }

  .ac-cancel {
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
  .ac-cancel:hover { border-color: var(--slate); color: var(--ink); }

  .ac-submit {
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
    box-shadow: 0 4px 20px rgba(244,63,114,0.28);
    transition: background 0.15s, transform 0.1s, box-shadow 0.15s;
    letter-spacing: 0.02em;
  }
  .ac-submit:hover {
    background: #e02860;
    box-shadow: 0 6px 28px rgba(244,63,114,0.38);
    transform: translateY(-1px);
  }
  .ac-submit:active { transform: scale(0.97); }
  .ac-submit svg { width: 15px; height: 15px; }

  /* ERRORS */
  .ac-errors {
    margin-top: 20px;
    padding: 16px 20px;
    background: #fff1f1;
    border: 1px solid #fecaca;
    border-left: 4px solid #ef4444;
    border-radius: 13px;
    animation: acFadeUp 0.3s ease both;
  }
  .ac-errors ul { list-style: none; padding: 0; display: flex; flex-direction: column; gap: 4px; }
  .ac-errors li {
    font-size: 13px;
    color: #b91c1c;
    display: flex;
    align-items: center;
    gap: 6px;
  }
  .ac-errors li::before { content: '·'; color: #ef4444; font-weight: 900; font-size: 16px; }

  /* ANIMATION */
  @keyframes acFadeUp {
    from { opacity: 0; transform: translateY(14px); }
    to   { opacity: 1; transform: translateY(0); }
  }

  @media (max-width: 520px) {
    .ac-row { grid-template-columns: 1fr; }
    .ac-services-grid { grid-template-columns: 1fr; }
    .ac-card { padding: 22px 18px; }
  }
</style>

<div class="ac-wrap">
  <div class="ac-inner">

    {{-- HEADER --}}
    <div class="ac-header">
      <div class="ac-eyebrow">✦ Nueva Cita</div>
      <h2 class="ac-title">Agendar Cita</h2>
    </div>

    <div class="ac-card">
      <form action="{{ route('appointments.store') }}" method="POST">
        @csrf

        {{-- CLIENTE --}}
        <div class="ac-row">
          <div class="ac-field">
            <label class="ac-label">Nombre de la Cliente</label>
            <input type="text" name="client_name" class="ac-input"
              placeholder="Ej. María López" required>
          </div>
          <div class="ac-field">
            <label class="ac-label">Teléfono</label>
            <input type="text" name="client_phone" class="ac-input"
              placeholder="9999-9999" required>
          </div>
        </div>

        {{-- SERVICIOS --}}
        <div class="ac-field">
          <label class="ac-label">Servicios Solicitados</label>
          <div class="ac-services-grid">
            @foreach($services as $service)
              <label class="ac-service-label">
                <input type="checkbox" name="services[]" value="{{ $service->id }}">
                <div>
                  <div class="ac-service-text">{{ $service->name }}</div>
                  <div class="ac-service-price">L. {{ number_format($service->price, 2) }}</div>
                </div>
              </label>
            @endforeach
          </div>
        </div>

        <hr class="ac-divider">

        {{-- FECHA Y HORA --}}
        <div class="ac-row">
          <div class="ac-field">
            <label class="ac-label">Fecha</label>
            <input type="date" name="date" min="{{ date('Y-m-d') }}"
              class="ac-input" required>
          </div>
          <div class="ac-field">
            <label class="ac-label">Hora</label>
            <div class="ac-select-wrap">
              <select name="time" class="ac-select" required>
                <option value="">Seleccione una hora</option>
                @for ($hour = 7; $hour <= 20; $hour++)
                  <option value="{{ sprintf('%02d:00', $hour) }}">{{ sprintf('%02d:00', $hour) }}</option>
                  <option value="{{ sprintf('%02d:30', $hour) }}">{{ sprintf('%02d:30', $hour) }}</option>
                @endfor
              </select>
            </div>
            <div id="availability-message" class="hidden mt-2 text-xs font-bold"></div>
          </div>
        </div>

        {{-- NOTAS --}}
        <div class="ac-field">
          <label class="ac-label">Notas Adicionales</label>
          <textarea name="notes" class="ac-textarea"
            placeholder="Ej. Trae diseño propio o necesita retiro de acrílico anterior"></textarea>
        </div>

        {{-- ACTIONS --}}
        <div class="ac-actions">
          <a href="{{ route('dashboard') }}" class="ac-cancel">Cancelar</a>
          <button type="submit" class="ac-submit">
            <svg fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M5 13l4 4L19 7"/>
            </svg>
            Agendar Cita
          </button>
        </div>

        {{-- ERRORS --}}
        @if ($errors->any())
          <div class="ac-errors">
            <ul>
              @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
              @endforeach
            </ul>
          </div>
        @endif

      </form>
    </div>

  </div>
</div>
<script>
document.addEventListener('DOMContentLoaded', function() {
    const dateInput = document.querySelector('input[name="date"]');
    const timeSelect = document.querySelector('select[name="time"]');
    const messageDiv = document.getElementById('availability-message');
    const submitBtn = document.querySelector('.ac-submit');

    function checkConflict() {
        const services = Array.from(document.querySelectorAll('input[name="services[]"]:checked')).map(cb => cb.value);
        const date = dateInput.value;
        const time = timeSelect.value;

        // Solo validar si ya tenemos fecha, hora y al menos un servicio
        if (date && time && services.length > 0) {
            fetch("{{ route('appointments.check') }}", {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                },
                body: JSON.stringify({ date, time, services })
            })
            .then(response => response.json())
            .then(data => {
                if (data.available) {
                    messageDiv.textContent = "✓ Horario disponible";
                    messageDiv.className = "mt-2 text-xs font-bold text-green-600 block";
                    submitBtn.disabled = false;
                    submitBtn.style.opacity = "1";
                } else {
                    messageDiv.textContent = "✕ Ya hay una cita en este horario";
                    messageDiv.className = "mt-2 text-xs font-bold text-red-600 block";
                    submitBtn.disabled = true;
                    submitBtn.style.opacity = "0.5";
                }
            });
        }
    }

    // Escuchar cambios en fecha, hora y checkboxes de servicios
    dateInput.addEventListener('change', checkConflict);
    timeSelect.addEventListener('change', checkConflict);
    document.querySelectorAll('input[name="services[]"]').forEach(cb => {
        cb.addEventListener('change', checkConflict);
    });
});
</script>
</x-app-layout>