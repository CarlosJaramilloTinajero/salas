<?php

namespace App\Http\Controllers;

use App\Models\reserva;
use App\Models\sala;
use Illuminate\Http\Request;

class reservaController extends Controller
{
    public function index()
    {
        $reservas = reserva::all();
        $salas = sala::all();
        return view('salas.reservas', ['reservas' => $reservas, 'salas' => $salas]);
    }
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

    public function update(Request $request, $reservaR)
    {
        $request->validate([
            'a_nombre_de' => 'required|min:5',
            'dia' => 'required',
            'desde' => 'required',
            'hasta' => 'required',
            'observaciones'
        ]);
        $reserva = reserva::find($reservaR);
        $reserva->a_nombre_de = $request->a_nombre_de;
        $reserva->dia = $request->dia;
        $reserva->desde = $request->desde;
        $reserva->desde = $request->desde;
        $reserva->hasta = $request->hasta;
        $reserva->observaciones = $request->observaciones;
        $reserva->sala_id = $request->sala;

        $reserva->save();

        return redirect()->back()->with('success', 'Reserva modificada correctamente');
    }

    public function destroy($reserva)
    {
        $reservaF = reserva::find($reserva);
        $reservaF->delete();
        return redirect()->back()->with('success', 'Reserva eliminada correctamente');
    }
}
