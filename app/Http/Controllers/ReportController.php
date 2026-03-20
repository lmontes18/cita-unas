<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use App\Models\Service;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class ReportController extends Controller
{
    public function index()
    {
        $mesActual = Carbon::now()->month;
        $anioActual = Carbon::now()->year;
        $mesPasado = Carbon::now()->subMonth()->month;

        // 1. Ingresos Mes Actual vs Mes Pasado
        $ingresosMesActual = Appointment::where('status', 'completed')
            ->whereMonth('start_time', $mesActual)
            ->whereYear('start_time', $anioActual)
            ->with('services')
            ->get()
            ->sum(function($cita) { return $cita->total; });

        $ingresosMesPasado = Appointment::where('status', 'completed')
            ->whereMonth('start_time', $mesPasado)
            ->whereYear('start_time', $anioActual)
            ->with('services')
            ->get()
            ->sum(function($cita) { return $cita->total; });

        // 2. Servicios más solicitados (Top 5)
        $topServicios = DB::table('appointment_service')
            ->join('services', 'services.id', '=', 'appointment_service.service_id')
            ->select('services.name', DB::raw('count(*) as total_usos'))
            ->groupBy('services.name')
            ->orderBy('total_usos', 'desc')
            ->take(5)
            ->get();

        // 3. Listado de todas las ventas (con paginación)
        $ventas = Appointment::where('status', 'completed')
            ->with('services')
            ->orderBy('start_time', 'desc')
            ->paginate(15);

        return view('reports.index', compact(
            'ingresosMesActual', 
            'ingresosMesPasado', 
            'topServicios', 
            'ventas'
        ));
    }
}