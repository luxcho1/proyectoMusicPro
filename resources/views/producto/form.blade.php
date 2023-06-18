

@if(count($errors)>0)
    <div class="alert alert-danger">
        <ul>
            @foreach( $errors->all() as $error )
                <li>{{ $error }}</li> 
            @endforeach
        </ul>
    </div>
@endif
    
    
    <div class="container-fluid">
        <div class="form-group">
            <label for="Nombre">Nombre: </label>
            <input class="form-control" type="text" name="Nombre" value="{{ isset($producto->Nombre)?$producto->Nombre:old('Nombre') }}" id="Nombre">
        </div>
        <br>
        <div class="form-group">
            <label for="Codigo">Codigo: </label>
            <input class="form-control" type="text" name="Codigo" value="{{ isset($producto->Codigo)?$producto->Codigo:old('Codigo') }}" id="Codigo">
        </div>
        <br>
        <div class="form-group">
            <label for="Descripcion">Descripción: </label>
            <input class="form-control" type="text" name="Descripcion" value="{{ isset($producto->Descripcion)?$producto->Descripcion:old('Descripcion') }}" id="Descripcion">
        </div>
        <br>
        <div class="form-group">
            <label for="Precio">Precio: </label>
            <input class="form-control" type="number" name="Precio" value="{{ isset($producto->Precio)?$producto->Precio:old('Precio') }}" id="Precio" >
        </div>
        <br>
        <div class="form-group">
            <label for="Stock">Stock: </label>
            <input class="form-control" type="number" name="Stock" value="{{ isset($producto->Stock)?$producto->Stock:old('Stock') }}" id="Stock">
        </div>
        <br>
        <div class="form-group">
            @if(isset($producto->Foto))
            <img class="img-thumbnail img-fluid" src="{{ asset('storage'.'/'.$producto->Foto) }}" width="100" alt="">
            @endif
            <input class="form-control" type="file" name="Foto" id="Foto">
        </div>
        <br>
        <div>
                <input class="btn btn-success" type="submit" value="{{ $modo }} Producto">
                <a class="btn btn-primary" href="{{ url('producto/') }}">Regresar</a>
        </div>
    </div>
