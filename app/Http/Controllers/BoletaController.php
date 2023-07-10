<?php

namespace App\Http\Controllers;

use App\Models\Boleta;
use App\Models\DetalleBoleta;

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
        // Obtener el carrito desde la sesión
        $carro = session()->get('carro');

        // Crear una nueva instancia de Boleta
        $boleta = new Boleta;
        $boleta->num_boleta = strtoupper(Str::random(8));
        $boleta->fecha = Carbon::now('America/Santiago')->format('d-m-Y');
        $boleta->hora = Carbon::now('America/Santiago')->toTimeString();
        $boleta->Total = $request->input('Total');
        $boleta->save();

        // Guardar los productos del carrito en la boleta
        foreach ($carro as $id => $producto) {
            $nombre = $producto['Nombre'];
            $foto = $producto['Foto'];
            $precio = $producto['Precio'];
            $cantidad = $producto['quantity'];

            // Obtener el número de boleta truncado para ajustarse a la longitud máxima permitida
            $numBoleta = substr($boleta->num_boleta, 0, 8);

            // Guardar los detalles del producto en la boleta
            $detalle = new DetalleBoleta;
            $detalle->num_boleta = $numBoleta;
            $detalle->detalle = $nombre;
            $detalle->cantidad = $cantidad;
            $detalle->precio = $precio;
            $detalle->total = $cantidad * $precio;
            $detalle->save();
         }


        // Limpiar el carrito de la sesión después de utilizarlo si es necesario
        session()->forget('carro');

        return redirect()->route('home');
        Session::flash('message', 'Boleta creada correctamente');
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
        // Obtener la boleta según el ID proporcionado
        $boleta = Boleta::findOrFail($id);

        // Guardar el número de boleta en la sesión
        session(['num_boleta' => $boleta->num_boleta]);

        // Obtener los detalles de la boleta según el número de boleta de la boleta
        $detalleBoleta = DetalleBoleta::where('num_boleta', $boleta->num_boleta)->get();

        // Pasar la boleta y los detalles de la boleta a la vista
        return view('detalle', compact('boleta', 'detalleBoleta'));
    }

    // public function edit($id)
    // {
    //     // Obtener la boleta según el ID proporcionado
    //     $boleta = Boleta::findOrFail($id);

    //     // Obtener los detalles de la boleta según el número de boleta de la boleta
    //     $detalleBoleta = DetalleBoleta::where('num_boleta', $boleta->num_boleta)->get();

    //     // Pasar la boleta y los detalles de la boleta a la vista
        
    //     return view('detalle', compact('boleta', 'detalleBoleta'));
    //     session(['num_boleta' => $boleta->num_boleta]);
    // }
    
    


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
