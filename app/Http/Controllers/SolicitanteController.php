<?php

namespace App\Http\Controllers;

use App\Solicitante;
use Illuminate\Http\Request;

class SolicitanteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $solicitante = Solicitante::all();
        return $solicitante;
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
        $solicitante = new Solicitante();
        $solicitante->curp = $request->curp;
        $solicitante->nombre = $request->nombre;
        $solicitante->apellidopat =$request->apellidopat;
        $solicitante->apellidomat =$request->apellidomat;
        $solicitante->RFC =$request->RFC;
        $solicitante->Correoe =$request->Correoe;
        $solicitante->save();

        return response()->json([
            "message" => "solicitante registrado correctamente"
        ], 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Solicitante  $solicitante
     * @return \Illuminate\Http\Response
     */
    public function show(Solicitante $solicitante)
    {
        $solicitante = Solicitante::findOrFail($solicitante->id);
        return $solicitante;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Solicitante  $solicitante
     * @return \Illuminate\Http\Response
     */
    public function edit(Solicitante $solicitante)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Solicitante  $solicitante
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Solicitante $id)
    {
        $solicitante =Solicitante::findOrFail($request->id);
        $solicitante->curp = $request->curp;
        $solicitante->nombre = $request->nombre;
        $solicitante->apellidopat =$request->apellidopat;
        $solicitante->apellidomat =$request->apellidomat;
        $solicitante->RFC =$request->RFC;
        $solicitante->Correoe =$request->Correoe;
        $solicitante->save();
        
        return $solicitante;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Solicitante  $solicitante
     * @return \Illuminate\Http\Response
     */
    public function destroy(Solicitante $solicitante)
    {
        $solicitante->delete();
        return $solicitante;
    }
}
