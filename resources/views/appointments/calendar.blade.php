<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                <div class="flex justify-between items-center mb-6">
                    <h2 class="text-2xl font-bold text-gray-800">Agenda de Citas</h2>
                    <a href="{{ route('appointments.create') }}" class="bg-pink-500 text-white px-4 py-2 rounded font-bold hover:bg-pink-600 transition">
                        + Agendar Nueva
                    </a>
                </div>

                <div id='calendar' class="bg-white"></div>
            </div>
        </div>
    </div>

    <script src='https://cdn.jsdelivr.net/npm/fullcalendar@6.1.10/index.global.min.js'></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var calendarEl = document.getElementById('calendar');
            var calendar = new FullCalendar.Calendar(calendarEl, {
                initialView: 'timeGridWeek', // Vista semanal con horas
                slotMinTime: '08:00:00',     // Hora de inicio (8 AM)
                slotMaxTime: '19:00:00',     // Hora de fin (7 PM)
                allDaySlot: false,
                locale: 'es',                // Idioma español
                headerToolbar: {
                    left: 'prev,next today',
                    center: 'title',
                    right: 'dayGridMonth,timeGridWeek,timeGridDay'
                },
                buttonText: {
                    today: 'Hoy',
                    month: 'Mes',
                    week: 'Semana',
                    day: 'Día'
                },
                events: @json($events), // Pasamos los eventos desde PHP a JS
                eventClick: function(info) {
                    if (info.event.url) {
                        window.location.href = info.event.url;
                        return false;
                    }
                }
            });
            calendar.render();
        });
    </script>

    <style>
        /* Ajustes estéticos para que se vea más moderno */
        .fc-header-toolbar { margin-bottom: 2rem !important; }
        .fc-button-primary { background-color: #000 !important; border-color: #000 !important; }
        .fc-event { cursor: pointer; border: none !important; padding: 2px; }
        .fc-v-event { background-color: var(--fc-event-bg-color); }
    </style>
</x-app-layout>