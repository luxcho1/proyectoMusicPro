<?php

namespace App\Http\Controllers;

use App\Models\Boleta;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Date;
use Illuminate\Support\Carbon;



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
        $boletas = Boleta::all();
        return view('boleta', compact('boletas'));

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
        //Crear Boleta
        $boleta = new Boleta;
        $boleta->num_boleta = strtoupper(Str::random(8)); 
        $boleta->fecha = Carbon::now('America/Santiago')->format('d-m-Y');
        $boleta->hora  = Carbon::now('America/Santiago')->toTimeString();
        $boleta->Total = $request->input('Total');
        $boleta->save();


        return redirect()->route('home');
        Session::flash('message', 'Boleta creada correctamente');

        
        // //
        // $datosBoleta = request()->all();
        // Boleta::insert($datosBoleta);
        // //return response()->json($datosBoleta);
        // return redirect()->route('home');

        
        
        
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
    public function edit($id)
    {
        //
        $boleta=Boleta::findOrFail($id);
        return view('detalle',['boleta' => $boleta]);
        
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
