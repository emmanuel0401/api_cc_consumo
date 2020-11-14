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
            "mensaje" => "solicitante registrado correctamente"
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
    public function update(Request $request, $id)
    {
        if (Solicitante::where('id', $id)->exists()) {
            $solicitante = Solicitante::find($id);
            $solicitante->curp = is_null($request->curp) ? $solicitante->curp : $request->curp;
            $solicitante->nombre = is_null($request->nombre) ? $solicitante->nonbre : $request->nombre;
            $solicitante->apellidopat = is_null($request->apellidopat) ? $solicitante->apellidopat : $request->apellidopat;
            $solicitante->apellidomat = is_null($request->apellidomat) ? $solicitante->apellidomat : $request->apellidomat;
            $solicitante->RFC = is_null($request->RFC) ? $solicitante->RFC : $request->RFC;
            $solicitante->Correoe = is_null($request->Correoe) ? $solicitante->Correoe : $request->Correoe;
            $solicitante->save();
    
            return response()->json(["mensaje" => "datos actualizados correctamente" ], 200);
            } else {
            return response()->json(["mensaje" => "Solicitante no encontrado"], 404);
                    }
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
        return response()->json(["mensaje" => "Solicitante #$solicitante->id eliminado", ]);
    }
}
