<?php

namespace App\Http\Controllers;

use App\Models\reserva;
use Illuminate\Http\Request;

class reservaController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'a_nombre_de' => 'required|min:5',
            'dia' => 'required',
            'desde' => 'required',
            'hasta' => 'required',
            'observaciones'
        ]);
        $reserva = new reserva();
        $reserva->a_nombre_de = $request->a_nombre_de;
        $reserva->dia = $request->dia;
        $reserva->desde = $request->desde;
        $reserva->desde = $request->desde;
        $reserva->hasta = $request->hasta;
        $reserva->observaciones = $request->observaciones;
        $reserva->sala_id = $request->sala;

        $reserva->save();

        return redirect()->back()->with('success', 'Sala reservada correctamente');

    }
}
