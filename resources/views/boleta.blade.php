@extends('layouts.app')
@section('content')
<head>
    <script src="assets/jquery.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js" integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous"></script>
</head>


<body>
   <div class="container">
    <table class="table">
        <thead>
          <tr>
            <th scope="col">ID Boleta</th>
            <th scope="col">Nombre</th>
            <th scope="col">Precio</th>
            <th scope="col">Total</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <th scope="row">1</th>
            <td>Prueba 1</td>
            <td>$1500</td>
            <td>$4000</td>
            <td>
                <a href="{{ url('encomienda') }}" class="btn btn-success">Crear encomienda</a>
            </td>
          </tr>
          <tr>
            <th scope="row">2</th>
            <td>Prueba 2</td>
            <td>$2500</td>
            <td>$3500</td>
            <td><button type="button" class="btn btn-primary">Crear encomienda</button></td>
          </tr>
          <tr>
            <th scope="row">2</th>
            <td>Prueba 3</td>
            <td>$2500</td>
            <td>$3500</td>
            <td><button type="button" class="btn btn-primary">Crear encomienda</button></td>
          </tr>
        </tbody>
      </table>
   </div>
</body>


@endsection
