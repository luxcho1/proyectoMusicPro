@extends('layouts.app')
@section('content')
<div class="container">

    <h1>Mostrar lista de productos</h1>
    
    <h2>Consumo de api: {{ $saludo['message'] }}</h2>


    @if(Session::has('mensaje'))    
    <div class="alert alert-success alert-dismissible" role="alert">
        {{ Session::get('mensaje') }}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close" >
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    @endif
    
    
<a href="{{ url('producto/create') }}" class="btn btn-success">Registrar nuevo producto</a>
<br>
<br>
<table class="table table-light">
    <thead class="thead-light">
        <tr>
            <th>Foto</th>
            <th>Nombre</th>
            <th>Codigo</th>
            <th>Descripción</th>
            <th>Precio</th>
            <th>Stock</th>
            <th>Acciones</th>
            
        </tr>
    </thead>


    <tbody>
        @foreach($productos as $producto)
        <tr>
            <td>
                <img class="img-thumbnail img-fluid" src="{{ asset('storage'.'/'.$producto->Foto) }}" width="100" alt="">
            </td>
            <td>{{ $producto->Nombre }}</td>
            <td>{{ $producto->Codigo }}</td>
            <td>{{ $producto->Descripcion }}</td>
            <td>$ {{ $producto->Precio }}</td>
            <td>{{ $producto->Stock }}</td>
            <td>
                <a href="{{ url('/producto/'.$producto->id.'/edit') }}" class="btn btn-warning">
                    Editar
                </a>

                <form action="{{ url('/producto/'.$producto->id) }}" class="d-inline" method="post">
                    @csrf
                    {{ method_field('DELETE') }}
                    <input class="btn btn-danger" type="submit" onclick="return confirm('¿Quieres borrar?')" value="Borrar">
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>


</table>
</div>
@endsection