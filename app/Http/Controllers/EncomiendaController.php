<?php

namespace App\Http\Controllers;

use App\Models\Encomienda;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class EncomiendaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view('encomienda');
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
        // Validar los datos del formulario si es necesario
        $request->validate([
            'nombre_origen' => 'required|string|max:100',
            'direccion_origen' => 'required|string|max:100',
            'nombre_destino' => 'required|string|max:100',
            'direccion_destino' => 'required|string|max:100',
            'comentario' => 'required|string|max:100',
            'info' => 'required|string|max:1000'
        ]);

        // Obtener los valores del formulario
        $nombre_origen     = $request->input('nombre_origen');
        $direccion_origen  = $request->input('direccion_origen');
        $nombre_destino    = $request->input('nombre_destino');
        $direccion_destino = $request->input('direccion_destino');
        $comentario        = $request->input('comentario');
        $info              = $request->input('info');

        // Enviar la solicitud POST a la URL especificada
        $response = Http::post('https://musicpro.bemtorres.win/api/v1/transporte/solicitud', [
            'nombre_origen'     => $nombre_origen,
            'direccion_origen'  => $direccion_origen,
            'nombre_destino'    => $nombre_destino,
            'direccion_destino' => $direccion_destino,
            'comentario'        => $comentario,
            'info'              => $info
        ]);

        if ($response->ok()) {
            // La solicitud se realizó correctamente (código de respuesta HTTP 2xx)
            $responseData = $response->json();
            // Procesar la respuesta JSON aquí
        } else {
            // La solicitud falló, puedes manejar el error de alguna manera
            $errorCode = $response->status();
            // Manejar el error aquí
        }

        // Redirigir a una página de confirmación u otra acción después de enviar la solicitud
    }
    


    
    public function getEncomienda(){
        return response()->json(Encomienda::all(),200);
    }
    
    public function insertEncomienda(Request $request){
        $encomienda = Encomienda::create($request->all());
        if(is_null($encomienda)){
            return response()->json(['message'=>'Hubo un problema para ingresar'],404);
        }
        return response()->json($producto,200);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Encomienda  $encomienda
     * @return \Illuminate\Http\Response
     */
    public function show(Encomienda $encomienda)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Encomienda  $encomienda
     * @return \Illuminate\Http\Response
     */
    public function edit(Encomienda $encomienda)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Encomienda  $encomienda
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Encomienda $encomienda)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Encomienda  $encomienda
     * @return \Illuminate\Http\Response
     */
    public function destroy(Encomienda $encomienda)
    {
        //
    }
}
