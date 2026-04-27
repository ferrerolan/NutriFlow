<?php

namespace App\Http\Controllers\Paciente;

use App\Http\Controllers\Controller;
use App\Models\Paciente;
use Illuminate\Support\Facades\Session;

class DashboardController extends Controller
{
    public function index()
    {
        $pacienteId = Session::get('paciente_id');

        $paciente = Paciente::with([
            'planosAlimentares',
            'mensuracoes',
            'treinos',
        ])->find($pacienteId);

        if (! $paciente) {
            return redirect()->route('paciente.login');
        }

        $planos = $paciente->planosAlimentares()->latest()->get();
        $mensuracoes = $paciente->mensuracoes()->latest('data_medicao')->get();
        $treinos = $paciente->treinos()->latest()->get();

        return view('paciente.dashboard', compact(
            'paciente',
            'planos',
            'mensuracoes',
            'treinos'
        ));
    }
}
