@extends('layouts.app')
@section('content')
<head>
    <script src="assets/jquery.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js" integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous"></script>
</head>

<body>
    <h1 style="text-align: center">Detalle de boleta</h1> 
    <div class="container">
        <h4>Número de boleta: {{ $boleta->num_boleta }}</h4>
        <h5>Fecha: {{ $boleta->fecha }}</h5>
        <h5>Hora: {{ $boleta->hora }}</h5>

        <table class="table">
            <thead class="thead-dark">
                <tr>
                    <th>Producto Nombre</th>
                    <th>Cantidad</th>
                    <th>Precio</th>
                    <th>Subtotal</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($detalleBoleta as $detalle)
                    <tr>
                        <td>{{ $detalle->detalle }}</td>
                        <td>{{ $detalle->cantidad }}</td>
                        <td>{{ $detalle->precio }}</td>
                        <td>{{ $detalle->total }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <h4>Total: {{ $boleta->total }}</h4>
        <a class="btn btn-primary" href="{{ url('boleta') }}">Regresar</a>
        <a class="btn btn-success" href="{{ url('encomienda') }}">Crear encomienda</a> 
    </div>
  </body>
  @endsection