@extends('layouts.app')
@section('content')
<script src="assets/jquery.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js" integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous"></script>


<h1 style="text-align: center">Inventario API Code Con Clave</h1>

<div class="container">
    <h2 style="padding-block-start: 5%">Productos API</h2>
{{-- <h5>Consumo de api status: "{{ $apiProducto['message'] }}"</h5> --}}
<table class="table table-light">
    <thead class="thead-light">
        <tr>
            <th>ID</th>
            <th>Nombre</th>
            <th>Precio</th>
        </tr>
    </thead>
    <tbody>
        @foreach($apiProducto['productos'] as $producto)
        <tr>
            <td>{{ $producto['id'] }}</td>
            <td>{{ $producto['nombre'] }}</td>
            <td>{{ $producto['precio'] }}</td>
        </tr>
        @endforeach
    </tbody>
</table>
</div>

<div class="container">
    <form action="{{ route('integracionapi.store') }}" method="post" >
        @csrf
        <div class="container">
            <div class="form-group">
                <label for="id">ID Producto: </label>
                <input class="form-control" type="text" name="id" id="id">
            </div>
            <br>
            <div class="form-group">
                <label for="nombre">Nombre producto: </label>
                <input class="form-control" type="text" name="nombre" id="nombre">
            </div>
            <br>
            <div class="form-group">
                <label for="categoria">Categoría: </label>
                <input class="form-control" type="text" name="categoria" id="categoria">
            </div>
            <br>
            <div class="form-group">
                <label for="estado">Estado: </label>
                <input class="form-control" type="text" name="estado" id="estado" value="true" readonly>
            </div>
            <br>
            {{-- <div class="form-group">
                @if(isset($producto->Foto))
                <img class="img-thumbnail img-fluid" src="{{ asset('storage'.'/'.$producto->Foto) }}" width="100" alt="">
                @endif
                <input class="form-control" type="file" name="imagen" id="imagen">
            </div> --}}
            <br>
            <div class="form-group">
                <label for="stock">Stock: </label>
                <input class="form-control" type="text" name="stock" id="stock">
            </div>
            <br>
            <div class="form-group">
                <label for="precio">Precio: </label>
                <input class="form-control" type="text" name="precio"  id="precio" >
            </div>
            <br>
            <div>
                <a class="btn btn-primary" href="{{ url('/') }}">Regresar</a>
                <input class="btn btn-success" type="submit" value="Crear producto API">
        
            </div>
        </div>
    </form>
</div>
@endsection

