@extends('layouts.app')
@section('content')
<script src="assets/jquery.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js" integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">




<body>
    <header>

    </header>
    <main>
        <div class="container">
            @if(Session::has('mensaje'))
            <div class="alert alert-success alert-dismissible" role="alert">
                {{ Session::get('mensaje') }}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close" >
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            @endif

            <div class="row">
                {{--CARRO DE COMPRAS--}}
                <div class="col-sm">
                    <button type="button" class="btn btn-primary" data-bs-toggle="dropdown">
                        <i class="fa fa-shopping-cart" aria-hidden="true"></i> Carro
                        <span class="badge badge-pill badge-danger">{{ count((array) session('carro')) }}</span>
                      </button>

                    <div class="dropdown-menu">

                        {{--TOTAL--}}
                        <div class="row total-header-section">
                            @php $total = 0 @endphp
                            @foreach((array) session('carro') as $id => $details)
                                @php $total += $details['Precio'] * $details['quantity'] @endphp
                            @endforeach
                            <div class="col-lg-12 col-sm-12 col-12 total-section text-right">
                                <h2>Total: ${{ $total }}</h2>
                            </div>
                        </div>

                        {{--PRODUCTOS--}}
                        @if(session('carro'))
                            @foreach(session('carro') as $id => $details)
                            <div class="container text-center">
                                <div class="row">
                                    {{--FOTO--}}
                                    <div class="col">
                                        <img class="img-thumbnail img-fluid" src="{{ asset('storage') }}/{{ $details['Foto'] }}" width="100" alt="" />
                                    </div>


                                    {{--NOMBRE--}}
                                    <div class="col">
                                        <h5> {{ $details['Nombre'] }} </h5>
                                        <div class="row">
                                            <div class="col">
                                                <h6>Precio: {{ $details['Precio'] }} </h6>
                                            </div>
                                            <div class="col">
                                                <h6>Cantidad: {{ $details['quantity'] }} </h6>
                                            </div>
                                          </div>
                                    </div>


                                    {{--BORRAR--}}
                                    <div class="col">
                                        <form action="{{ route('eliminar-porducto') }}" method="post">
                                            @csrf
                                            @method('DELETE')
                                            <input type="hidden" name="id" value="{{ $id }}">
                                            <button type="submit" class="btn btn-danger remove-from-cart" >Eliminar</button>
                                        </form>
                                    </div>
                                </div>
                              </div>
                            @endforeach
                        @endif
                        {{--MOSTRAR EL TOTAL DE CARRO--}}
                        <div class="row">
                            <div class="col-lg-12 col-sm-12 col-12 text-center checkout">
                                <a href="{{ route('carro') }}" class="btn btn-primary btn-block">Ir a mi carro</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="container" style="text-align: center">
                <h1>Inventario Bodega</h1>
            </div>

            {{--MOSTRAR API PRODUCTOS--}}
            <h2 style="padding-block-start: 5%">Mostrar productos API</h2>
            {{-- <h5>Consumo de api status: "{{ $apiProducto['message'] }}"</h5> --}}
            <table class="table table-light">
                <thead class="thead-light">
                    <tr>
                        <th>Foto</th>
                        <th>Codigo</th>
                        <th>Nombre</th>
                        <th>Descripcion</th>
                        <th>Precio</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($apiProducto['productos'] as $producto)
                    <tr>
                        <td>
                            <img class="img-thumbnail img-fluid" src="{{ asset($producto['asset'])}}" width="100" alt="">
                        </td>
                        <td>{{ $producto['codigo'] }}</td>
                        <td>{{ $producto['nombre'] }}</td>
                        <td>{{ $producto['descripcion'] }}</td>
                        <td>{{ $producto['precio'] }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>


            {{--CRUD DE BODEGA--}}
            <h1 style="padding-block-start: 5%">Mostrar productos de forma local</h1>
            <div class="container">
                @if(session('success'))
                    <div class="alert alert-success">
                    {{ session('success') }}
                    </div>
                @endif
            </div>
            @yield('scripts')

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

                            <p
                                class="btn-holder"><a href="{{ route('añadir_al_carrito', $producto->id) }}" class="btn btn-primary btn-block text-center" role="button">Añadir al carrito</a>
                            </p>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <script type="text/javascript">

            function NewTab() {
                window.open(
            "https://musicpro.bemtorres.win/transporte", "_blank");
        }

        //     $(".remove-from-cart").click(function (e) {
        //     e.preventDefault();
        //     var ele = $(this);
        //     if(confirm("Are you sure")) {
        //         $.ajax({
        //             url: '{{ url('remove-from-cart') }}',
        //             method: "DELETE",
        //             data: {_token: '{{ csrf_token() }}', id: ele.attr("data-id")},
        //             success: function (response) {
        //                 console.log(response);
        //                 // window.location.reload();
        //             }
        //         });
        //     }
        // });
        </script>
        @endsection
    </main>
</body>


