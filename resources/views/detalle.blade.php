@extends('layouts.app')
@section('content')
<head>
    <script src="assets/jquery.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js" integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous"></script>
</head>

<body>
    <h1 style="text-align: center">Detalle</h1> 
    <div class="container">
      <table class="table">
        <thead>
            <tr>
                <th>Foto</th>
                <th>Nombre</th>
                <th>Precio</th>
                <th>Cantidad</th>
                <th>Subtotal</th>
            </tr>
        </thead>

        <tbody>
            <td>  {{ $boleta->num_boleta }} </td>
            <td>  {{ $boleta->hora }}      </td>
            {{-- @foreach ($encomiendas as $encomienda)
                <tr>
                    <td>  {{ $encomienda->nombre_origen }} </td>
                    <td>  {{ $encomienda->direccion_origen }} </td>
                    <td>  {{ $encomienda->nombre_destino }} </td>
                    <td>  {{ $encomienda->direccion_destino }} </td>
                    <td>  {{ $encomienda->comentario }} </td>
                    <td>  {{ $encomienda->info }} </td>
                    <td>  {{ $encomienda->codigo_seguimiento }} </td>
                    <td>  {{ $encomienda->estado_seguimiento }} </td>
                    <td>  {{ $encomienda->id_boleta }} </td>
                </tr>
            @endforeach --}}
        </tbody>
    </table>
    <a class="btn btn-primary" href="{{ url('boleta') }}">Regresar</a>
     </div>
  </body>
  
  
  @endsection