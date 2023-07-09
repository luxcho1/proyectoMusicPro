<?php

namespace App\Http\Controllers;

use App\Models\DetalleBoleta;
use Illuminate\Http\Request;

class DetalleBoletaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        //return view('detalle');
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\DetalleBoleta  $detalleBoleta
     * @return \Illuminate\Http\Response
     */
    public function show(DetalleBoleta $detalleBoleta)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\DetalleBoleta  $detalleBoleta
     * @return \Illuminate\Http\Response
     */
    public function edit(DetalleBoleta $detalleBoleta)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\DetalleBoleta  $detalleBoleta
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, DetalleBoleta $detalleBoleta)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\DetalleBoleta  $detalleBoleta
     * @return \Illuminate\Http\Response
     */
    public function destroy(DetalleBoleta $detalleBoleta)
    {
        //
    }
}
