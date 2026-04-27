<?php

namespace App\Http\Controllers\Paciente;

use App\Http\Controllers\Controller;
use App\Models\Paciente;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class AuthController extends Controller
{
    public function showLogin()
    {
        return view('paciente.login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
        ]);

        $paciente = Paciente::where('email', $request->email)->first();

        if (! $paciente) {
            return back()->withErrors([
                'email' => 'Paciente não encontrado.',
            ]);
        }

        Session::put('paciente_id', $paciente->id);

        return redirect()->route('paciente.dashboard');
    }
}
