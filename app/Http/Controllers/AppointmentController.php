<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use App\Models\Service;
use Illuminate\Http\Request;
use Carbon\Carbon;

class AppointmentController extends Controller
{
    public function index()
    {
        // Obtenemos las citas ordenadas por la más cercana
        $appointments = Appointment::with('services')
            ->orderBy('start_time', 'asc')
            ->paginate(10); // Para que no se haga una lista infinita

        return view('appointments.index', compact('appointments'));
    }
    public function create()
    {
        // Traemos los servicios activos para el select
        $services = Service::where('is_active', true)->get();
        return view('appointments.create', compact('services'));
    }

    // ... otros métodos

    public function edit(Appointment $appointment)
    {
        $services = Service::where('is_active', true)->get();
        // Obtenemos los IDs de los servicios actuales para marcarlos en el select/checkbox
        $selectedServices = $appointment->services->pluck('id')->toArray();

        return view('appointments.edit', compact('appointment', 'services', 'selectedServices'));
    }

    public function update(Request $request, Appointment $appointment)
    {
        $request->validate([
            'services' => 'required|array',
            'client_name' => 'required|string',
            'date' => 'required|date',
            'time' => 'required',
        ]);

        $start = Carbon::parse($request->date . ' ' . $request->time);
        $services = Service::find($request->services);
        $totalMinutes = $services->sum('duration_minutes');
        $end = $start->copy()->addMinutes($totalMinutes);

        // Validar conflictos ignorando la cita actual y las canceladas
        $exists = Appointment::where('id', '!=', $appointment->id)
            ->where('status', '!=', 'cancelled')
            ->where(function ($query) use ($start, $end) {
                $query->where('start_time', '<', $end)
                    ->where('end_time', '>', $start);
            })->exists();

        if ($exists) {
            return back()->withErrors(['time' => 'Ya hay una cita en ese horario.'])->withInput();
        }

        // Actualizamos los datos. 
        // IMPORTANTE: No toques el campo 'status' aquí para que no cambie a completed.
        $appointment->update([
            'client_name' => $request->client_name,
            'client_phone' => $request->client_phone,
            'start_time' => $start->format('Y-m-d H:i:s'),
            'end_time' => $end->format('Y-m-d H:i:s'),
            'notes' => $request->notes,
        ]);

        $appointment->services()->sync($request->services);

        return redirect()->route('appointments.index')->with('success', 'Cita actualizada correctamente.');
    }

    public function cancel($id)
    {
        $appointment = Appointment::findOrFail($id);
        $appointment->status = 'cancelled';
        $appointment->save();

        return back()->with('success', 'Cita cancelada correctamente.');
    }
   public function store(Request $request)
{
    try {

        $request->validate([
            'services' => 'required|array',
            'services.*' => 'exists:services,id',
            'client_name' => 'required|string',
            'date' => 'required|date',
            'time' => 'required',
        ]);

        // 🔥 Unir fecha + hora
        $start = Carbon::parse($request->date . ' ' . $request->time);

        // 🔥 Obtener servicios correctamente
        $services = Service::whereIn('id', $request->services)->get();

        if ($services->isEmpty()) {
            return back()->withErrors([
                'services' => 'Servicios inválidos'
            ])->withInput();
        }

        // Calcular duración total
        $totalMinutes = $services->sum('duration_minutes');
        $end = $start->copy()->addMinutes($totalMinutes);

        // 🔥 VALIDAR CONFLICTOS
        $exists = Appointment::where(function ($query) use ($start, $end) {
            $query->where('start_time', '<', $end)
                  ->where('end_time', '>', $start);
        })->exists();

        if ($exists) {
            return back()->withErrors([
                'time' => 'Ya hay una cita en ese horario.'
            ])->withInput();
        }

        // 🔥 Crear cita
        $appointment = Appointment::create([
            'client_name' => $request->client_name,
            'client_phone' => $request->client_phone,
            'start_time' => $start->format('Y-m-d H:i:s'),
            'end_time' => $end->format('Y-m-d H:i:s'),
            'notes' => $request->notes,
            'status' => 'pending',
        ]);

        // 🔥 Validar antes de attach
        if (!is_array($request->services)) {
            return back()->withErrors([
                'services' => 'Formato incorrecto'
            ])->withInput();
        }

        // 🔥 Relación servicios (más seguro)
        $appointment->services()->sync($request->services);

        return redirect()->route('appointments.index')
            ->with('success', 'Cita creada correctamente.');

    } catch (\Exception $e) {
    return response()->json([
        'message' => $e->getMessage(),
        'line' => $e->getLine(),
        'file' => $e->getFile()
    ]);
}
}

    public function checkAvailability(Request $request)
    {
        $start = Carbon::parse($request->date . ' ' . $request->time);
        $services = Service::find($request->services);
        $totalMinutes = $services ? $services->sum('duration_minutes') : 0;
        $end = $start->copy()->addMinutes($totalMinutes);

        $exists = Appointment::where(function ($query) use ($start, $end) {
            $query->where('start_time', '<', $end)
                ->where('end_time', '>', $start);
        })
            ->where('status', '!=', 'cancelled')
            // Si estamos editando, ignoramos la cita actual
            ->when($request->appointment_id, function ($q) use ($request) {
                return $q->where('id', '!=', $request->appointment_id);
            })
            ->exists();

        return response()->json(['available' => !$exists]);
    }
   public function complete(Request $request, $id)
{
    $appointment = Appointment::findOrFail($id);
    
    // Si la manicurista puso un precio, usamos ese. 
    // Si no, podemos usar el total sumado de los servicios como respaldo.
    $appointment->final_price = $request->final_price;
    $appointment->status = 'completed';
    $appointment->save();

    return back()->with('success', '¡Cita completada y cobro registrado!');
}
    public function calendar()
    {
        $appointments = Appointment::with('services')->get();

        $events = $appointments->map(function ($app) {
            return [
                'id' => $app->id,
                'title' => $app->client_name . ' (' . $app->services->implode('name', ', ') . ')',
                'start' => $app->start_time,
                'end' => $app->end_time,
                'color' => $app->status == 'completed' ? '#10b981' : '#ec4899', // Verde si completada, Rosa si pendiente
                'url' => route('appointments.index'), // Opcional: que al dar clic la lleve al listado
            ];
        });

        return view('appointments.calendar', compact('events'));
    }

}