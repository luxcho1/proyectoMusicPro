@extends('layouts.app')
@section('content')
<div class="container">
<h1>Formulario de creacion de producto</h1>

<form action="{{ url('/producto') }}" method="post" enctype="multipart/form-data">
@csrf
@include('producto.form',['modo'=>'Crear']);
</form>
</div>
@endsection