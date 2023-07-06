<?php

namespace App\Http\Controllers;

use App\Models\IntegracionApi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class IntegracionApiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //

        // $response = Http::get('https://musicpro.bemtorres.win/api/v1/bodega/producto');
        $response = Http::get('http://127.0.0.1:8000/api/v1/productos');
        $apiProducto = $response->json();

        return view('integracionapi',compact('apiProducto'));
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
        // Validar los datos del formulario si es necesario
        // $request->validate([
        //     'id'         => 'required|string|max:100',
        //     'nombre'     => 'required|string|max:100',
        //     'categoria'  => 'required|string|max:100',
        //     'estado'     => 'required|string|max:100',
        //     'imagen'     => 'required|string|max:100',
        //     'stock'      => 'required|string|max:1000',
        //     'precio'     => 'required|string|max:1000'
        // ]);

        // Obtener los valores del formulario
    $id         = $request->input('id');
    $nombre     = $request->input('nombre');
    $categoria  = $request->input('categoria');
    $estado     = $request->input('estado');
    $imagen     = $request->input('imagen');
    $stock      = $request->input('stock');
    $precio     = $request->input('precio');

    // Enviar la solicitud POST a la URL especificada
    $response = Http::post('http://127.0.0.1:8000/api/productos/', [
        'id'          => $id,
        'nombre'      => $nombre,
        'categoria'   => $categoria,
        'estado'      => $estado,
        'imagen'      => $imagen,
        'stock'       => $stock,
        'precio'      => $precio
    ]);

    // Verificar la respuesta de la API
    if ($response->successful()) {
        // La solicitud fue exitosa, puedes realizar acciones adicionales si es necesario
        // Por ejemplo, redireccionar a una página de confirmación o mostrar un mensaje al usuario
        return redirect()->back()->with('success', 'El producto se ha enviado a la API correctamente.');
    } else {
        // La solicitud no fue exitosa, puedes manejar el error de acuerdo a tus necesidades
        return redirect()->back()->with('error', 'Error al enviar el producto a la API. Por favor, intenta nuevamente.');
    }
    
    }





    /**
     * Display the specified resource.
     *
     * @param  \App\Models\IntegracionApi  $integracionApi
     * @return \Illuminate\Http\Response
     */
    public function show(IntegracionApi $integracionApi)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\IntegracionApi  $integracionApi
     * @return \Illuminate\Http\Response
     */
    public function edit(IntegracionApi $integracionApi)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\IntegracionApi  $integracionApi
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, IntegracionApi $integracionApi)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\IntegracionApi  $integracionApi
     * @return \Illuminate\Http\Response
     */
    public function destroy(IntegracionApi $integracionApi)
    {
        //
    }
}
