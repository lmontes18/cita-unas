<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\expenses;
class ExpenseController extends Controller
{
    public function index()
{
    // Obtenemos los gastos ordenados por la fecha de creación más reciente
    $expenses = Expenses::orderBy('date', 'desc')
        ->orderBy('created_at', 'desc')
        ->paginate(10);

    return view('expenses.index', compact('expenses'));
}
    public function store(Request $request) {
    $request->validate([
        'description' => 'required|string',
        'amount' => 'required|numeric',
        'date' => 'required|date',
    ]);

    Expenses::create($request->all());
    return back()->with('success', 'Gasto registrado correctamente.');
}
public function destroy(Expenses $expense)
{
    $expense->delete();

    return back()->with('success', 'Gasto eliminado correctamente.');
}
}
