<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Appointment;
use App\Models\expenses;

class DashboardController extends Controller
{
   public function index()
{
    $inicioSemana = now()->startOfWeek();
    $finSemana = now()->endOfWeek();
    $hoy = now()->format('Y-m-d'); // 🔥 Fecha de hoy

    // 1. Ingresos y Gastos (Lo que ya tenías)
    $ingresos = Appointment::where('status', 'completed')
        ->whereBetween('start_time', [$inicioSemana, $finSemana])
        ->with('services')
        ->get()
        ->sum(function($cita) { return $cita->total; });

    $gastos = Expenses::whereBetween('date', [$inicioSemana, $finSemana])->sum('amount');
    $balance = $ingresos - $gastos;

    // 2. 🔥 NUEVO: Citas para HOY
    $citasHoy = Appointment::whereDate('start_time', $hoy)
        ->with('services')
        ->orderBy('start_time', 'asc')
        ->get();

    return view('dashboard', compact('ingresos', 'gastos', 'balance', 'citasHoy'));
}
}
