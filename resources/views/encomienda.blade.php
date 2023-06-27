@extends('layouts.app')
@section('content')
<script src="assets/jquery.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js" integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous"></script>



<form action="{{ url('/encomienda') }}" method="post" >
@csrf
<div class="container">
    <div class="form-group">
        <label for="Nombre">Nombre Origen: </label>
        <input class="form-control" type="text" name="nombre_origen" id="nombre_origen">
    </div>
    <br>
    <div class="form-group">
        <label for="Codigo">Direccion Origen: </label>
        <input class="form-control" type="text" name="direccion_origen" id="direccion_origen">
    </div>
    <br>
    <div class="form-group">
        <label for="Descripcion">Nombre Destino: </label>
        <input class="form-control" type="text" name="nombre_destino" id="nombre_destino">
    </div>
    <br>
    <div class="form-group">
        <label for="Precio">Direccion Origen: </label>
        <input class="form-control" type="text" name="direccion_destino" id="direccion_destino" >
    </div>
    <br>
    <div class="form-group">
        <label for="Stock">Comentario: </label>
        <input class="form-control" type="text" name="comentario" id="comentario">
    </div>
    <br>
    <div class="form-group">
        <label for="Stock">Info: </label>
        <input class="form-control" type="text" name="info"  id="info" >
    </div>
    <br>
    <div>
        <a class="btn btn-primary" href="{{ url('home/') }}">Regresar</a>    
        <input class="btn btn-success" type="submit" value="Enviar Encomienda" href="{{ url('home/') }}">
            
    </div>
</div>



@endsection