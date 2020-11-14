<?php

namespace App\Http\Controllers;

use App\Escritura;
use Illuminate\Http\Request;

class EscrituraController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $escritura = Escritura::all();
        return $escritura;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $escritura = new Escritura();
        $escritura->nombrepropietario = $request->nombrepropietario;
        $escritura->apellidopat = $request->apellidopat;
        $escritura->apellidomat = $request->apellidomat;
        $escritura->notaria = $request->notaria;
        $escritura->expediente = $request->expediente;
        $escritura->tomo = $request->tomo;
        $escritura->numeroescritura = $request->numeroescritura;
        $escritura->save();

        return response()->json([
            "mensaje" => "pago creado correctamente"], 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Escritura  $escritura
     * @return \Illuminate\Http\Response
     */
    public function show(Escritura $escritura)
    {
        $escritura = Escritura::findOrFail($escritura->id);
        return $escritura;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Escritura  $escritura
     * @return \Illuminate\Http\Response
     */
    public function edit(Escritura $escritura)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Escritura  $escritura
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Escritura $escritura)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Escritura  $escritura
     * @return \Illuminate\Http\Response
     */
    public function destroy(Escritura $escritura)
    {
        $escritura->delete();
        return response()->json(["mensaje" => "Escritura #$escritura->id eliminado", ]);
  
    }
}
