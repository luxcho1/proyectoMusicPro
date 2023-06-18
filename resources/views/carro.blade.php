@extends('home')
   
@section('content')
<script src="assets/jquery.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js" integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous"></script>

<div class="container">
    <table class="table table-light">
        <thead class="thead-light">
            <tr>
                <th>Foto</th>
                <th>Nombre</th>
                <th>Precio</th>
                <th>Cantidad</th>
                <th>Subtotal</th>
            </tr>
        </thead>

    
    
    
        <tbody>
            <form action="{{ url('/carro') }}" method="post">
            @csrf

            @php $total = 0 @endphp
            @if(session('carro'))
                @foreach(session('carro') as $id => $details)
                    @php $total += $details['Precio'] * $details['quantity'] @endphp
                    <tr data-id="{{ $id }}">
                        
                        {{--INSERTAR FOTO--}}
                        <td>
                            <img class="img-thumbnail img-fluid" src="{{ asset('storage') }}/{{ $details['Foto'] }}" width="100" alt="">
                        </td>



                        {{--INSERTAR NOMBRE--}}
                        <td>
                            <h2 id="Nombre" name="Nombre" >{{ $details['Nombre'] }}</h2>
                            <input type="hidden" id="Nombre" name="Nombre" value="{{ $details['Nombre'] }}">
                        </td>



                        {{--INSERTAR PRECIO--}}
                        <td>
                            <h2 id="Precio" name="Precio" >{{ $details['Precio'] }}</h2>
                            <input type="hidden" id="Precio" name="Precio" value="{{ $details['Precio'] }}">
                        </td>



                        {{--INSERTAR CANTIDAD--}}
                        <td>
                            <h2 id="Quantity" name="Quantity" >{{ $details['quantity'] }}</h2>
                            <input type="hidden" id="Quantity" name="Quantity" value="{{ $details['quantity'] }}">
                        </td>


                        {{--INSERTAR SUBTOTAL--}}
                        <td>
                            <h2 id="Subtotal" name="Subtotal" >${{ $details['Precio'] * $details['quantity'] }}</h2>
                        </td>
                    </tr>
                @endforeach
            @endif
        </tbody>
    </table>


    {{--INSERTAR TOTAL--}}
    <h2 name="Total" id="Total"><strong>Total ${{ $total }}</strong></h2>
    <input type="hidden" id="Total" name="Total" value="{{ $total }}">


    <a href="{{ url('/') }}" class="btn btn-danger"> <i class="fa fa-arrow-left"></i> Seguir Comprando</a>
    {{--<input class="btn btn-success" type="submit" value="Crear Boleta">--}}
</form>
</div>
@endsection