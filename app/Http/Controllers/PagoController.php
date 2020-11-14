<?php

namespace App\Http\Controllers;

use App\Pago;
use Illuminate\Http\Request;

class PagoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pago = Pago::all();
        return $pago;
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
        $pago = new pago();
        $pago->hojas = $request->hojas;
        $pago->fechapago = $request->fechapago;
        $pago->estatus = $request->estatus;
        $pago->save();

        return response()->json([
            "mensaje" => "pago creado correctamente"], 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Pago  $pago
     * @return \Illuminate\Http\Response
     */
    public function show(Pago $pago)
    {
        $pago = Pago::findOrFail($pago->idpagos);
        return $pago;
}

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Pago  $pago
     * @return \Illuminate\Http\Response
     */
    public function edit(Pago $pago)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Pago  $pago
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $idpagos)
    {
        /*$pago = Pago::findOrFail($request->id);
        $pago->hojas = $request->hojas;
        $pago->fechapago = $request->fechapago;
        $pago->estatus = $request->estatus;
        $pago->save();
        return $pago;*/
        if (Pago::where('idpagos', $idpagos)->exists()) {
            $pago = Pago::find($idpagos);
            $pago->hojas = is_null($request->hojas) ? $pago->hojas : $request->hojas;
            $pago->fechapago = is_null($request->fechapago) ? $pago->fechapago : $request->fechapago;
            $pago->estatus = is_null($request->estatus) ? $pago->estatus : $request->estatus;
            $pago->save();
    
            return response()->json(["mensaje" => "datos actualizados correctamente" ], 200);
            } else {
            return response()->json(["mensaje" => "Pago no encontrado"], 404);
                    }
            }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Pago  $pago
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pago $pago)
    {
        $pago->delete();
        return response()->json(["mensaje" => "Pago #$pago->idpagos eliminado", ]);
}
}