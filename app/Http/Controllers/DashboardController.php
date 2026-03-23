<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Appointment;
use App\Models\Expenses; // Asegúrate de que la 'E' sea mayúscula si así se llama el modelo

class DashboardController extends Controller
{
    public function index()
    {
        $inicioSemana = now()->startOfWeek();
        $finSemana = now()->endOfWeek();
        $hoy = now()->format('Y-m-d');

        // 1. Ingresos usando final_price
        $ingresos = Appointment::where('status', 'completed')
            ->whereBetween('start_time', [$inicioSemana, $finSemana])
            ->get()
            ->sum(function($cita) { 
                // Si final_price existe y no es cero, usa ese. Si no, usa el total base.
                return $cita->final_price > 0 ? $cita->final_price : $cita->total; 
            });

        $gastos = Expenses::whereBetween('date', [$inicioSemana, $finSemana])->sum('amount');
        $balance = $ingresos - $gastos;

        // 2. Citas para HOY
        $citasHoy = Appointment::whereDate('start_time', $hoy)
            ->with('services')
            ->orderBy('start_time', 'asc')
            ->get();

        return view('dashboard', compact('ingresos', 'gastos', 'balance', 'citasHoy'));
    }
}