<?php

namespace App\Http\Controllers;

use App\PropertyDeed;
use Illuminate\Http\Request;

class PropertyDeedController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $property_deeds = PropertyDeed::all();
        return $property_deeds;
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
        $propertyDeed = new PropertyDeed;
        $propertyDeed->nombrepropietario =$request->nombrepropietario;
        $propertyDeed->apellidopaterno =$request->apellidopaterno;
        $propertyDeed->apellidomaterno =$request->apellidomaterno;
        $propertyDeed->notaria =$request->notaria;
        $propertyDeed->expediente =$request->expediente;
        $propertyDeed->tomo = $propertyDeed->tomo;
        $propertyDeed->numeroescritura =$propertyDeed->numeroescritura;
        $propertyDeed->save();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\PropertyDeed  $propertyDeed
     * @return \Illuminate\Http\Response
     */
    public function show(PropertyDeed $propertyDeed)
    {
        $propertyDeed = PropertyDeed::findOrFail($propertyDeed->id);
        return $propertyDeed;
        //return PropertyDeed::where('propertyDeed', $propertyDeed)->get();
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\PropertyDeed  $propertyDeed
     * @return \Illuminate\Http\Response
     */
    public function edit(PropertyDeed $propertyDeed)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\PropertyDeed  $propertyDeed
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, PropertyDeed $propertyDeed)
    {
        $propertyDeed =PropertyDeed::findOrFail($request->id);
        $propertyDeed->nombrepropietario =$request->nombrepropietario;
        $propertyDeed->apellidopaterno =$request->apellidopaterno;
        $propertyDeed->apellidomaterno =$request->apellidomaterno;
        $propertyDeed->notaria =$request->notaria;
        $propertyDeed->expediente =$request->expediente;
        $propertyDeed->tomo = $propertyDeed->tomo;
        $propertyDeed->numeroescritura =$propertyDeed->numeroescritura;
        $propertyDeed->save();

        return $propertyDeed;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\PropertyDeed  $propertyDeed
     * @return \Illuminate\Http\Response
     */
    public function destroy(PropertyDeed $propertyDeed)
    {
        $propertyDeed = PropertyDeed::destroy($propertyDeed->id);
        return $propertyDeed;
    }
}
