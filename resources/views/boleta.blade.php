@extends('layouts.app')
@section('content')
<head>
    <script src="assets/jquery.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js" integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous"></script>
</head>


<body>
  <h1 style="text-align: center">Inventario de boletas</h1> 
  <div class="container">
    <table class="table">
      <thead>
          <tr>
              <th>Número de boleta</th>
              <th>Fecha</th>
              <th>Hora</th>
              <th>Total</th>
              <th>Accion</th>
          </tr>
      </thead>
      <tbody>
          @foreach ($boletas as $boleta)
              <tr>
                  <td>  {{ $boleta->num_boleta }} </td>
                  <td>  {{ $boleta->fecha }}      </td>
                  <td>  {{ $boleta->hora }}       </td>
                  <td>$ {{ $boleta->total }}      </td>
                  <td> 
                       <a href="{{ url('/boleta/'.$boleta->id.'/detalle') }}" class="btn btn-primary">
                        Detalle boleta
                       </a>
                       
                 </td>
                       
              </tr>
          @endforeach
      </tbody>
  </table>
  <a class="btn btn-primary" href="{{ url('/') }}">Regresar</a>
   </div>
</body>


@endsection
