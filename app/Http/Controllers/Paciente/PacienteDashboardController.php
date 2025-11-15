<?php

namespace App\Http\Controllers;

use App\Models\PlanoAlimentar;
use Illuminate\Support\Facades\Auth;

class PacienteDashboardController extends Controller
{
    public function index()
    {
        $paciente = Auth::user();

        // busca planos criados pelo nutricionista para esse paciente
        $planos = PlanoAlimentar::where('paciente_id', $paciente->id)->get();

        return view('paciente.dashboard', compact('paciente', 'planos'));
    }
}
