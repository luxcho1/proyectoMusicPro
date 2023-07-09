<?php

namespace App\Http\Controllers;

use App\Models\Producto;
use App\Http\Controllers\BoletaController;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Storage;


/**
* @OA\Info(
*             title="API Producto MusicPro",
*             version="1.0",
*             description="Documentacion de como usar la API Bodega"
* )
*
* @OA\Server(url="http://127.0.0.1:8000")
*/
class ProductoController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
 /**
     * Listado de todos los productos
     * @OA\Get (
     *     path="/api/producto",
     *     tags={"Producto"},
     *     @OA\Response(
     *         response=200,
     *         description="Peticion hecha correctamente",
     *         @OA\JsonContent(
     *             @OA\Property(
     *                 type="array",
     *                 property="rows",
     *                 @OA\Items(
     *                     type="object",
     *                     @OA\Property(
     *                         property="id",
     *                         type="number",
     *                         example="1"
     *                     ),
     *                     @OA\Property(
     *                         property="Nombre",
     *                         type="string",
     *                         example="Bateria"
     *                     ),
     *                     @OA\Property(
     *                         property="Codigo",
     *                         type="string",
     *                         example="sdh2DF23FF"
     *                     ),
     *                     @OA\Property(
     *                         property="Descripcion",
     *                         type="string",
     *                         example="Color: Blanco"
     *                     ),
     *                     @OA\Property(
     *                         property="Precio",
     *                         type="number",
     *                         example="2500"
     *                     ),
     *                     @OA\Property(
     *                         property="Stock",
     *                         type="number",
     *                         example="4"
     *                     ),
     *                     @OA\Property(
     *                         property="Foto",
     *                         type="string",
     *                         example="https://picsum.photos/200/300"
     *                     ),
     *                     @OA\Property(
     *                         property="created_at",
     *                         type="string",
     *                         example="2023-02-23T00:09:16.000000Z"
     *                     ),
     *                     @OA\Property(
     *                         property="updated_at",
     *                         type="string",
     *                         example="2023-02-23T12:33:45.000000Z"
     *                     )
     *                 )
     *             )
     *         )
     *     )
     * )
     */
        //php artisan l5-swagger:generate




     public function index()
    {
        //
        //Consumir Productos localmente
        $datos['productos']=Producto::paginate(1000);

        $response = Http::get('https://musicpro.bemtorres.win/api/v1/bodega/producto');
        $apiProducto = $response->json();


        // dump($apiProducto);
        //return $apiProducto;
        return view('producto.index',
                    compact('apiProducto'),
                    $datos);

        //return view( ['apiProducto' => $apiProducto]);







        // //Consumir API Productos
        // $response = Http::get('https://musicpro.bemtorres.win/api/v1/bodega/producto');
        // $producto = $response -> json('productos');
        // dump($producto);
        // //return $response;

        // return view('producto.index', $datos, compact('producto'));

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


       /**
     * Registrar la información de un producto
     * @OA\Post (
     *     path="/api/producto",
     *     tags={"Producto"},
     *     @OA\RequestBody(
     *         @OA\MediaType(
     *             mediaType="application/json",
     *             @OA\Schema(
     *                 @OA\Property(
     *                      type="object",
     *                      @OA\Property(
     *                          property="nombres",
     *                          type="string"
     *                      ),
     *                      @OA\Property(
     *                          property="apellidos",
     *                          type="string"
     *                      )
     *                 ),
     *                 example={
     *                     "nombres":"Aderson Felix",
     *                     "apellidos":"Jara Lazaro"
     *                }
     *             )
     *         )
     *      ),
     *      @OA\Response(
     *          response=201,
     *          description="CREATED",
     *          @OA\JsonContent(
     *              @OA\Property(property="id", type="number", example=1),
     *              @OA\Property(property="nombres", type="string", example="Aderson Felix"),
     *              @OA\Property(property="apellidos", type="string", example="Jara Lazaro"),
     *              @OA\Property(property="created_at", type="string", example="2023-02-23T00:09:16.000000Z"),
     *              @OA\Property(property="updated_at", type="string", example="2023-02-23T12:33:45.000000Z")
     *          )
     *      ),
     *      @OA\Response(
     *          response=422,
     *          description="UNPROCESSABLE CONTENT",
     *          @OA\JsonContent(
     *              @OA\Property(property="message", type="string", example="The apellidos field is required."),
     *              @OA\Property(property="errors", type="string", example="Objeto de errores"),
     *          )
     *      )
     * )
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




    /**
     * Mostrar la información de un producto
     * @OA\Get (
     *     path="/api/producto/{id}",
     *     tags={"Producto"},
     *     @OA\Parameter(
     *         in="path",
     *         name="id",
     *         required=true,
     *         @OA\Schema(type="string")
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="OK",
     *         @OA\JsonContent(
     *              @OA\Property(property="id", type="number", example=1),
     *              @OA\Property(property="Nombre", type="string", example="Bateria"),
     *              @OA\Property(property="Codigo", type="string", example="KSDH22D2"),
     *              @OA\Property(property="created_at", type="string", example="2023-02-23T00:09:16.000000Z"),
     *              @OA\Property(property="updated_at", type="string", example="2023-02-23T12:33:45.000000Z")
     *         )
     *     ),
     *      @OA\Response(
     *          response=404,
     *          description="NOT FOUND",
     *          @OA\JsonContent(
     *              @OA\Property(property="message", type="string", example="No query results for model [App\\Models\\Producto] #id"),
     *          )
     *      )
     * )
     */


     public function show(Producto $producto)
    {
        //
        return $producto;
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


    /**
     * Actualizar la información de un Producto
     * @OA\Put (
     *     path="/api/producto/{id}",
     *     tags={"Producto"},
     *     @OA\Parameter(
     *         in="path",
     *         name="id",
     *         required=true,
     *         @OA\Schema(type="string")
     *     ),
     *     @OA\RequestBody(
     *         @OA\MediaType(
     *             mediaType="application/json",
     *             @OA\Schema(
     *                 @OA\Property(
     *                      type="object",
     *                      @OA\Property(
     *                          property="nombres",
     *                          type="string"
     *                      ),
     *                      @OA\Property(
     *                          property="apellidos",
     *                          type="string"
     *                      )
     *                 ),
     *                 example={
     *                     "nombres": "Aderson Felix Editado",
     *                     "apellidos": "Jara Lazaro Editado"
     *                }
     *             )
     *         )
     *      ),
     *      @OA\Response(
     *          response=200,
     *          description="success",
     *          @OA\JsonContent(
     *              @OA\Property(property="id", type="number", example=1),
     *              @OA\Property(property="nombres", type="string", example="Aderson Felix Editado"),
     *              @OA\Property(property="apellidos", type="string", example="Jara Lazaro Editado"),
     *              @OA\Property(property="created_at", type="string", example="2023-02-23T00:09:16.000000Z"),
     *              @OA\Property(property="updated_at", type="string", example="2023-02-23T12:33:45.000000Z")
     *          )
     *      ),
     *      @OA\Response(
     *          response=422,
     *          description="UNPROCESSABLE CONTENT",
     *          @OA\JsonContent(
     *              @OA\Property(property="message", type="string", example="The apellidos field is required."),
     *              @OA\Property(property="errors", type="string", example="Objeto de errores"),
     *          )
     *      )
     * )
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



     /**
     * Eliminar la información de un Producto
     * @OA\Delete (
     *     path="/api/producto/{id}",
     *     tags={"Producto"},
     *     @OA\Parameter(
     *         in="path",
     *         name="id",
     *         required=true,
     *         @OA\Schema(type="string")
     *     ),
     *     @OA\Response(
     *         response=204,
     *         description="NO CONTENT"
     *     ),
     *      @OA\Response(
     *          response=404,
     *          description="NOT FOUND",
     *          @OA\JsonContent(
     *              @OA\Property(property="message", type="string", example="No se pudo realizar correctamente la operación"),
     *          )
     *      )
     * )
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



    //CREAR API REST PRODUCTO


    //MOSTRAR API PRODUCTOS
    public function getProducto(){
        return response()->json(Producto::all(),200);
    }

    //MOSTRAR API PRODUCTOS BY ID
    public function getProductoid($id){
        $producto = Producto::find($id);
        if(is_null($producto)){
            return response()->json(['message'=>'Registro no encontrado'],404);
        }
        return response()->json($producto,200);
    }

    //INSERTAR API PRODUCTOS
    public function insertProducto(Request $request){
        $producto = Producto::create($request->all());
        if(is_null($producto)){
            return response()->json(['message'=>'Hubo un problema para ingresar'],404);
        }
        return response()->json($producto,200);
    }

    //ACTUALIZAR API PRODUCTOS
    public function updateProducto(Request $request, $id){
        $producto = Producto::find($id);
        if(is_null($producto)){
            return response()->json(['message'=>'Registro no encontrado'],404);
        }
        $producto->update($request->all());
        return response()->json($producto,200);
    }

    //ELIMINAR API PRODUCTOS
    public function deleteProducto($id){
        $producto = Producto::find($id);
        if(is_null($producto)){
            return response()->json(['message'=>'Registro no encontrado'],404);
        }
        $producto->delete();
        return response()->json(['message'=>'Registro eliminado'],200);
    }





    //CARRO DE COMPRAS
    public function carro()
    {
        return view('carro');
    }

    public function añadirCarrito($id){
        $producto = Producto::findOrFail($id);

        $carro = session()->get('carro', []);

        if(isset($carro[$id])) {
            $carro[$id]['quantity']++;
        }  else {
            $carro[$id] = [
                "Nombre" => $producto->Nombre,
                "Foto" => $producto->Foto,
                "Precio" => $producto->Precio,
                "quantity" => 1
            ];
        }
        
        session()->put('carro', $carro);
        return redirect()->back()->with('success', 'Producto añadido al carro correctamente');
    }

    public function remove(Request $request)
    {
        if($request->id) {
            $carro = session()->get('carro');
            if(isset($carro[$request->id])) {
                unset($carro[$request->id]);
                session()->put('carro', $carro);
            }
            session()->flash('success', 'Product removed successfully');
        }

        return back()->with('success', 'Se ha eliminado');
    }

}
