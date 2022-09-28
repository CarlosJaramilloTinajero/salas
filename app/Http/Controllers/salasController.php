<?php

namespace App\Http\Controllers;

use App\Models\reserva;
use App\Models\sala;
use Illuminate\Http\Request;

class salasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $salas = sala::all();
        $reservas = reserva::all();
        return view('salas.index', ['salas' => $salas, 'reservas' => $reservas]);
    }

    public function lista()
    {
        $salas = sala::all();
        return view('salas.listaSalas', ['salas' => $salas]);
    }

    public function nuevaReserva()
    {
        $salas = sala::all();
        $reservas = reserva::all();
        return view('salas.reservarSala', ['salas' => $salas, 'reservas' => $reservas]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|min:5',
            'ubicacion' => 'required|min:5',
            'descripcion' => 'required|min:5',

        ]);

        $sala = new sala();
        $sala->nombre = $request->nombre;
        $sala->ubicacion = $request->ubicacion;
        $sala->descripcion = $request->descripcion;
        $sala->estado = $request->estado;
        $sala->save();
        return redirect()->back()->with('success', 'Sala "' . $request->nombre . '" agregada correctamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $sala = sala::find($id);
        return view('salas.modificarSala', ['sala' => $sala]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'nombre' => 'required|min:5',
            'ubicacion' => 'required|min:5',
            'descripcion' => 'required|min:5',
        ]);

        $sala = sala::find($id);
        $sala->nombre = $request->nombre;
        $sala->ubicacion = $request->ubicacion;
        $sala->descripcion = $request->descripcion;
        $sala->estado = $request->estado;

        $sala->save();

        return redirect()->back()->with('success', 'Sala "' . $sala->nombre . '" modificada correctamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $sala = sala::find($id);
        $sala->reservas()->each(function ($reserva) {
            $reserva->delete();
        });
        $sala->delete();
        return redirect()->back()->with('success', 'Sala "' . $sala->nombre . '" eliminada correctamente');
    }
}
