<?php

namespace App\Http\Controllers;

use App\Solicitud;
use Illuminate\Http\Request;

class SolicitudController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $solicitud = Solicitud::all();
        return $solicitud;
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
        $solicitud = new Solicitud();
        $solicitud->solicitante = $request->solicitante;
        $solicitud->propietario = $request->propietario;
        $solicitud->datosregistrales =$request->datosregistrales;
        $solicitud->region =$request->region;
        $solicitud->mz =$request->mz;
        $solicitud->lt =$request->lt;
        $solicitud->save();

        return response()->json([
            "mensaje" => "solicitantud registrado correctamente"
        ], 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Solicitud  $solicitud
     * @return \Illuminate\Http\Response
     */
    public function show(Solicitud $solicitud)
    {
        $solicitud = Solicitud::findOrFail($solicitud->id);
        return $solicitud;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Solicitud  $solicitud
     * @return \Illuminate\Http\Response
     */
    public function edit(Solicitud $solicitud)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Solicitud  $solicitud
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        if (Solicitud::where('id', $id)->exists()) {
            $solicitud = Solicitud::find($id);
            $solicitud->solicitante = is_null($request->solicitante) ? $solicitud->solicitante : $request->solicitante;
            $solicitud->propietario = is_null($request->propietario) ? $solicitud->propietario : $request->propietario;
            $solicitud->datosregistrales = is_null($request->datosregistrales) ? $solicitud->datosregistrales : $request->datosregistrales;
            $solicitud->region = is_null($request->region) ? $solicitud->region : $request->region;
            $solicitud->mz = is_null($request->mz) ? $solicitud->mz : $request->mz;
            $solicitud->lt = is_null($request->lt) ? $solicitud->lt : $request->lt;
            $solicitud->save();
    
            return response()->json(["mensaje" => "datos actualizados correctamente" ], 200);
            } else {
            return response()->json(["mensaje" => "Solicitud no encontrado"], 404);
                    }
            }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Solicitud  $solicitud
     * @return \Illuminate\Http\Response
     */
    public function destroy(Solicitud $solicitud)
    {
        $solicitud->delete();
        return response()->json(["mensaje" => "Solicitud #$solicitud->id eliminado", ]);
    }
}
