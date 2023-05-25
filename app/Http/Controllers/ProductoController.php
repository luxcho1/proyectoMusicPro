<?php

namespace App\Http\Controllers;

use App\Models\Producto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Storage;

class ProductoController extends Controller
{
    public function getProducto(){
        return response()->json(Producto::all(),200);
    }

    public function getProductoid($id){
        $producto = Producto::find($id);
        if(is_null($producto)){
            return response()->json(['message'=>'Registro no encontrado'],404);
        }
        return response()->json($producto,200);
    }
    
    public function insertProducto(Request $request){
        $producto = Producto::create($request->all());
        if(is_null($producto)){
            return response()->json(['message'=>'Hubo un problema para ingresar'],404);
        }
        return response()->json($producto,200);
    }

    public function updateProducto(Request $request, $id){
        $producto = Producto::find($id);
        if(is_null($producto)){
            return response()->json(['message'=>'Registro no encontrado'],404);
        }
        $producto->update($request->all());
        return response()->json($producto,200);
    }

    public function deleteProducto($id){
        $producto = Producto::find($id);
        if(is_null($producto)){
            return response()->json(['message'=>'Registro no encontrado'],404);
        }
        $producto->delete();
        return response()->json(['message'=>'Registro eliminado'],200);
    }
    
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //consumir api saludo profe
        
        //
        $datos['productos']=Producto::paginate(5);
        $response = Http::get('https://musicpro.bemtorres.win/api/v1/test/saludo');
        $saludo = $response -> json();
        return view('producto.index', $datos, compact('saludo'));
        
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('producto.create');
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
        $campos=[
            'Nombre' => 'required|string|max:100',
            'Codigo' => 'required|string|max:100',
            'Descripcion' => 'required|string|max:1000',
            'Precio' => 'required|numeric|max:99999',
            'Stock' => 'required|numeric|max:100',
            'Foto' => 'required|max:10000|mimes:jpeg,png,jpg',

        ];
        $mensaje=[
            'required' => 'El :attribute es requerido',
            'Foto.required' => 'La foto es requerida'
        ];

        $this->validate($request, $campos, $mensaje);

        //$datosProducto = request()->all();
        $datosProducto = request()->except('_token');

        if($request->hasFile('Foto')){
            $datosProducto['Foto']=$request->file('Foto')->store('uploads','public');
        }

        Producto::insert($datosProducto);
        
        //return response()->json($datosProducto);
        return redirect ('producto')->with('mensaje','Producto agregado correctamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Producto  $producto
     * @return \Illuminate\Http\Response
     */
    public function show(Producto $producto)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Producto  $producto
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $producto=Producto::findOrFail($id);

        return view('producto.edit',compact ('producto'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Producto  $producto
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $campos=[
            'Nombre' => 'required|string|max:100',
            'Codigo' => 'required|string|max:100',
            'Descripcion' => 'required|string|max:1000',
            'Precio' => 'required|numeric|max:99999',
            'Stock' => 'required|numeric|max:100',
            

        ];
        $mensaje=[
            'required' => 'El :attribute es requerido',
        ];

        if($request->hasFile('Foto')){
            $campos=['Foto' => 'required|max:10000|mimes:jpeg,png,jpg'];
            $mensaje=['Foto.required' => 'La foto es requerida'];
        }
        
        $this->validate($request, $campos, $mensaje);
        
        
        $datosProducto = request()->except(['_token','_method']);

        if($request->hasFile('Foto')){
            $producto=Producto::findOrFail($id);

            Storage::delete('public/'.$producto->Foto);

            $datosProducto['Foto']=$request->file('Foto')->store('uploads','public');
        }

        Producto::where('id','=',$id)->update($datosProducto);
        $producto=Producto::findOrFail($id);
        //return view('producto.edit',compact ('producto'));
        return redirect('producto')->with('mensaje','Producto actualizado correctamente');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Producto  $producto
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $producto=Producto::findOrFail($id);
        
        if(Storage::delete('public/'.$producto->Foto)){

            Producto::destroy($id);

        }
        return redirect('producto')->with('mensaje','Producto borrado correctamente');
    }
}
