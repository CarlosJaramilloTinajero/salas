<?php

namespace App\Http\Controllers;

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
        return view('salas.index', ['salas' => $salas]);
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
            'numeroDeSala' => 'required|unique:salas'
        ]);

        $sala = new sala();
        $sala->numeroDeSala = $request->numeroDeSala;
        $sala->disposicion = "desocupada";
        $sala->horaInicio = 0;
        $sala->horaFinal = 0;
        $sala->save();
        return redirect()->back()->with('success', 'Sala #' . $request->numeroDeSala . ' agregada correctamente');
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
            'numeroDeSala' => 'required|unique:salas'
        ]);

        $sala = sala::find($id);
        $sala->numeroDeSala = $request->numeroDeSala;
        $sala->save();

        return redirect()->back()->with('success', 'Sala modificada correctamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
