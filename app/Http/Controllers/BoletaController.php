<?php

namespace App\Http\Controllers;

use App\Models\Boleta;
use Illuminate\Http\Request;

class BoletaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */



     public function index()
    {
        //
        return view('boleta');

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        //return view('carro');
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

        //$datosBoleta = request()->all();
        //$datosBoleta = request()->all();
        //Boleta::insert($datosBoleta);
        //return response()->json($datosBoleta);
        //return view('carro');

        //
        // $campos=[
        //     'NombreOrigen' => 'required|string|max:100',
        //     'DireccionOrigen' => 'required|string|max:100',
        //     'NombreDestino' => 'required|string|max:100',
        //     'DireccionOrigen' => 'required|string|max:100',
        //     'Comentario' => 'required|string|max:100',
        //     'Info' => 'required|string|max:100',

        // ];
        // $mensaje=[
        //     'required' => 'El :attribute es requerido',
        // ];

        // $this->validate($request, $campos, $mensaje);

        // //$datosProducto = request()->all();
        // $datosEncomienda = request()->except('_token');


        // Producto::insert($datosEncomienda);

        // //return response()->json($datosProducto);
        // return redirect ('encomienda')->with('mensaje','Encomienda agregada correctamente');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Boleta  $boleta
     * @return \Illuminate\Http\Response
     */
    public function show(Boleta $boleta)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Boleta  $boleta
     * @return \Illuminate\Http\Response
     */
    public function edit(Boleta $boleta)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Boleta  $boleta
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Boleta $boleta)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Boleta  $boleta
     * @return \Illuminate\Http\Response
     */
    public function destroy(Boleta $boleta)
    {
        //
    }
}
